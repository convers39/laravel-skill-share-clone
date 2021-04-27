<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->with(['user'])->paginate(10);
        return view('course.list', [
            'courses' => $courses
        ]);
    }

    public function show(Course $course)
    {
        $course = Course::where('id', $course->id)
            // ->orWhere('slug', $course)
            ->firstOrFail();

        // TODO: More detailed logic on related course, based on teacher, category, tags
        $relatedCourses = Course::where('user_id', $course->user_id)->limit(3)->get();
        // dd($relatedCourses);
        return view('course.detail', [
            'course' => $course,
            'relatedCourses' => $relatedCourses,
        ]);
    }
}
