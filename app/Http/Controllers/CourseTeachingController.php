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
        //validate the request
        dd($request->all());
        // $user = $request->user();
        $request->validate([
            'title' => 'required',
            'desc' => 'required'
        ]);
        $course->update($request->all());
        $temp_file = TempFile::where('folder', $request->cover)->first();
        dd($request->all(), $temp_file);

        if ($temp_file) {
            $filepath = "app/public/covers/tmp/{$temp_file->folder}/{$temp_file->filename}";
            // $course->addMedia(storage_path("app/public/covers/tmp/{$temp_file->folder}/{$temp_file->filename}"))
            //     ->toMediaCollection('covers');
            Storage::move($filepath, "public/media/covers/");
            $course->url = "public/media/covers/{$temp_file->filename}";
            $course->save();

            rmdir(storage_path("app/public/covers/tmp/{$temp_file->folder}/"));
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
