<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CourseTeachingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $courses = $user->courses()->with(['user'])->paginate(5);
        return view('teaching.index', ['courses' => $courses, 'user' => $user]);
    }

    /**
     * Create a course instance and redirect to the edit page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // validate request

        // create a new empty instance
        $user = $request->user();
        $course = $user->courses()->create([
            'title' => 'My New Course',
            'desc' => 'Course description',
        ]);

        return redirect()->route('teaching.edit', ['course' => $course]);
    }

    /**
     * Will not be used.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the preview of an unpublished course, 
     * or redirect to the published course page.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('teaching.edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //TODO: save video instance to database
        //validate the request
        dd($request->all());
        $request->validate([
            'title' => 'required',
            'desc' => 'required'
        ]);
        // $course->update($request->all());
        $form_data = $request->all();
        $desc = strip_tags($form_data['desc']);
        $course->update([
            'title' => $form_data['title'],
            'desc' => $desc
        ]);

        // check if form includes cover or video file uploaded
        $cover_folder = json_decode($form_data['coverFile'], TRUE)['folder'];
        $temp_file = TempFile::where('folder', $cover_folder)->first();

        if ($temp_file) {
            // retrieve file path and target path
            $filepath = "{$temp_file->prefix}/tmp/{$temp_file->folder}/{$temp_file->filename}";
            $target_path = "{$temp_file->prefix}/{$course->id}/{$temp_file->filename}";
            // check if current course already has a file
            if ($course->cover_img && Storage::exists($course->cover_img)) {
                Storage::delete($course->cover_img);
            }
            // move temp file to target folder, Storage will attach prefix in disk setting
            Storage::move($filepath, $target_path);
            // save to course img url prop
            $course->cover_img = "{$target_path}";
            $course->save();
            // remove temp directory and temp file record
            rmdir(storage_path("app/public/{$temp_file->prefix}/tmp/{$temp_file->folder}/"));
            $temp_file->delete();
        }
        return back()->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Course $course)
    {
        $course->delete();
        return back()->with('success', 'Course deleted successfully');
    }
}
