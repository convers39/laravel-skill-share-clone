<?php

namespace App\Http\Controllers;

use App\Models\TempFile;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        // $user = $request->user();
        if ($request->hasFile('coverFile')) {
            $file = $request->file('coverFile');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            // $extension = $file->getClientOriginalExtension();
            $file->storeAs("covers/tmp/{$folder}", $filename);
            // dd($request);
            TempFile::create([
                'folder' => $folder,
                'filename' => $filename,
            ]);
            return response()->json(['folder' => $folder]);
        }
        return response()->json(['msg' => 'Something went wrong!']);
        // return back()->with('warning', 'Upload is not completed.');
    }

    public function destroy(Request $request)
    {
        $folder = json_decode($request->getContent(), TRUE)['folder'];
        deleteDirectory(storage_path("app/public/covers/tmp/{$folder}/"));
        $temp_file = TempFile::where('folder', $folder)->first();
        if ($temp_file) {
            $temp_file->delete();
        }
        return response()->json(['msg' => 'File removed successfully']);
        // return back()->with('success', 'File deleted successfully.');
    }
}
