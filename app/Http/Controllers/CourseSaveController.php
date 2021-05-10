<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseSaveController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $courses = Course::latest('updated_at')->published()->get()->filter(function ($course) use ($user) {
            return $course->isSavedByUser($user);
        });

        return view('course-saved.index', compact('courses'));
    }

    public function save(Request $request, $courseId)
    {
        try {
            Course::findOrFail($courseId);
        } catch (ModelNotFoundException $exception) {
            return back()->with('error', 'Invalid Course id');
        }
        $user = $request->user();
        $saved = $user->saved_course;
        if (in_array($courseId, $saved)) {
            $saved = array_values(array_diff($saved, [$courseId]));
            $message = 'Course removed from bookmarks';
        } else {
            array_push($saved, $courseId);
            $message = 'Course saved successfully';
        }
        $user->update(['saved_course' => $saved]);
        return back()->with('success', $message);
        // return response()->json(['msg' => 'Course saved successfully']);
    }
}
