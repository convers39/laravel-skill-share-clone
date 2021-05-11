<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index($category = null)
    {
        // TODO: fix recursive descendants
        $courses = Course::latest('updated_at')->published()->with(['user']);
        if ($category) {
            $cate = Category::where('slug', $category)->firstOrFail();
            $courses = $courses->where('category_id', $cate->id);
        }
        $courses = $courses->paginate(6);
        return view('course.list', compact('courses'));
    }

    public function show(Request $request, Course $course)
    {
        $track = $request->input('track');
        $course = Course::findOrFail($course->id);
        if (!$course->published) {
            return back()->with('error', 'This course is not published');
        }

        $videos = $course->videos()->orderBy('track')->get();
        $currentVideo =  $videos->where('track', $track)->first() ?? $videos->first();

        // $comments = $course->comments();

        // TODO: More detailed logic on related course, based on teacher, category, tags
        $relatedCourses = Course::where('user_id', $course->user_id)->limit(3)->get();
        return view(
            'course.detail',
            compact('course', 'relatedCourses', 'videos', 'currentVideo')
        );
    }
}
