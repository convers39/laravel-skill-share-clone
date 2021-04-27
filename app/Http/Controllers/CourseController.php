<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('course.list', [
            'courses' => $courses
        ]);
    }

    public function show(Course $course)
    {
        // dd($course);
        $course = Course::where('id', $course->id)
            // ->orWhere('slug', $course)
            ->firstOrFail();
        return view('course.detail', [
            'course' => $course
        ]);
    }
}
