<?php

namespace App\Http\Controllers;

use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coverFile' => ['image', 'nullable'],
            'videoFile' => ['mimetypes:video/mpeg,video/mp4,video/ogg', 'nullable'],
        ]);
        //TODO: error handling
        if ($validator->fails()) {
            return response()->json(['msg' => 'Invalid file type.']);
        }

        // dd($request, $request->hasAny(['coverFile', 'videoFile']));
        if ($request->hasAny(['coverFile', 'videoFile'])) {
            if ($request->hasFile('coverFile') && $request->file('coverFile')->isValid()) {
                $file = $request->file('coverFile');
                $prefix = 'covers';
            }

            if ($request->hasFile('videoFile') && $request->file('videoFile')->isValid()) {
                $file = $request->file('videoFile');
                $prefix = 'videos';
            }

            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            // $extension = $file->getClientOriginalExtension();
            $file->storeAs("{$prefix}/tmp/{$folder}", $filename);
            TempFile::create([
                'prefix' => $prefix,
                'folder' => $folder,
                'filename' => $filename,
            ]);
            return response()->json(['folder' => $folder]);
        }
        return response()->json(['msg' => 'No file uploaded!']);
        // return back()->with('warning', 'Upload is not completed.');
    }

    public function destroy(Request $request)
    {
        $folder = json_decode($request->getContent(), TRUE)['folder'];
        $temp_file = TempFile::where('folder', $folder)->first();
        if ($temp_file) {
            deleteDirectory(storage_path("app/public/{$temp_file->prefix}/tmp/{$folder}/"));
            $temp_file->delete();
            return response()->json(['msg' => 'File removed successfully!']);
        }

        return response()->json(['msg' => 'File does not exist!']);
        // return back()->with('success', 'File deleted successfully.');
    }
}
