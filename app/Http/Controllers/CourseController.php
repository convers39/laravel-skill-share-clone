<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->with(['user'])->paginate(6);
        return view('course.list', [
            'courses' => $courses
        ]);
    }

    public function show(Request $request, Course $course)
    {
        $track = $request->input('track');
        $course = Course::where('id', $course->id)
            // ->orWhere('slug', $course)
            ->firstOrFail();
        $videos = $course->videos()->orderBy('id')->get();
        $currentVideo =  $videos->find($track) ?? $videos->first();
        // TODO: More detailed logic on related course, based on teacher, category, tags
        $relatedCourses = Course::where('user_id', $course->user_id)->limit(3)->get();
        // dd($relatedCourses);
        return view(
            'course.detail',
            compact('course', 'relatedCourses', 'videos', 'currentVideo')
        );
    }
}
