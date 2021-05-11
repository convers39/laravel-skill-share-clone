<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class BookmarkController extends Controller
{
    // toggle a bookmark of a course via the pivot table bookmarks
    public function toggle(Request $request, Course $course)
    {
        $user = $request->user();
        if ($course->isSavedBy($user)) {
            $user->bookmarks()->where('course_id', $course->id)->delete();
            $message = 'Course removed from bookmarks';
        } else {
            $course->bookmarks()->create(['user_id' => $user->id]);
            $message = 'Course saved successfully';
        }

        return back()->with('success', $message);
    }
}
