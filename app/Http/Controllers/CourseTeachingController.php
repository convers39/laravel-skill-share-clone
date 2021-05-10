<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Video;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;



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
        return view('teaching.index', compact('courses', 'user'));
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

        return redirect()->route('teaching.edit', compact('course'));
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
    public function show(Request $request, Course $course)
    {
        if ($course->published) {
            return redirect()->route('course.show', ['course' => $course]);
        }

        $videos = $course->videos()->orderBy('track')->get();
        $track = $request->input('track');
        $currentVideo =  $videos->where('track', $track)->first() ?? $videos->first();
        return view('teaching.preview', compact('course', 'videos', 'currentVideo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $videos = $course->videos()->get();
        return view('teaching.edit', compact('course', 'videos'));
    }

    /**
     * Publish or unpublish a course
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function publish(Request $request, Course $course)
    {
        $id = $request->route('courseId');
        try {
            $course = Course::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->with('error', $exception->getMessage());
        }

        $course->published = !$course->published;
        $course->save();

        if ($course->published) {
            return redirect()
                ->route('course.show', ['course' => $course])
                ->with('success', 'Course published successfully');
        }

        return back()->with('success', 'Course is now unpublished.');
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
        // TODO: separate validation to FormRequest
        //validate the request
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'category_id' => 'required',
        ]);
        // dd($request->all());
        $course->update($request->only('title', 'desc', 'category_id'));

        // check video file list
        $video_files = isset($request['videoFileList'])
            ? array_filter(explode(',', $request->input('videoFileList')))
            : [];
        if (!empty($video_files)) {
            $this->handleVideoFiles($video_files, $course);
        }

        // check if form includes cover file
        $cover_folder = isset($request['coverFile'])
            ? json_decode($request->input('coverFile'), TRUE)['folder']
            : null;
        $this->handleCoverFile($cover_folder, $course);

        $message = $course->wasChanged()
            ? "Course updated successfully"
            : "No Data was changed";
        return back()->with('success', $message);
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

    private function handleVideoFiles(array $folders, Course $course)
    {
        foreach ($folders as $folder) {
            $temp_file = TempFile::where('folder', $folder)->first();
            if ($temp_file) {
                // retrieve file path and target path
                [$filepath, $target_path] = $this->getFilePath($temp_file, $course->id);
                // create video instance if the file does not exist
                if (!Storage::exists($target_path)) {
                    $count = $course->videos->count();
                    Video::create([
                        'course_id' => $course->id,
                        'title' => $temp_file->filename,
                        'url' => $target_path,
                        'track' => $count + 1
                    ]);
                }
                // overwrite old file if the file exists
                $this->moveFile($temp_file, $filepath, $target_path);
            }
        }
        return;
    }

    private function handleCoverFile($folder, Course $course)
    {
        $temp_file = TempFile::where('folder', $folder)->first();
        if ($temp_file) {
            // retrieve file path and target path
            [$filepath, $target_path] = $this->getFilePath($temp_file, $course->id);
            // save to course img url prop
            $course->cover_img = $target_path;
            $course->save();
            $this->moveFile($temp_file, $filepath, $target_path);
        }
        return;
    }

    private function getFilePath(TempFile $temp_file, $course_id)
    {
        $filepath = "{$temp_file->prefix}/tmp/{$temp_file->folder}/{$temp_file->filename}";
        $target_path = "{$temp_file->prefix}/{$course_id}/{$temp_file->filename}";
        return [$filepath, $target_path];
    }

    private function moveFile(TempFile $temp_file, $filepath, $target_path)
    {
        // overwrite if file exists
        if (Storage::exists($target_path)) {
            Storage::delete($target_path);
        }
        // move temp file to target folder, Storage will attach prefix in disk setting
        Storage::move($filepath, $target_path);
        // remove temp directory and temp file record
        rmdir(storage_path("app/public/{$temp_file->prefix}/tmp/{$temp_file->folder}/"));
        $temp_file->delete();
        return;
    }
}
