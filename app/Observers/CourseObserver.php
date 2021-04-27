<?php

namespace App\Observers;

use App\Models\Course;
use Illuminate\Support\Str;

class CourseObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;

    /**
     * Handle the Course "created" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function created(Course $course)
    {
        if (is_null($course->slug)) {
            $course->slug = Str::slug($course->title);
        }
    }

    /**
     * Handle the Course "updated" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function updated(Course $course)
    {
        if ($course->wasChanged('title')) {
            $course->slug = Str::slug($course->title);
        }
    }

    /**
     * Handle the Course "deleted" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function deleted(Course $course)
    {
        //
    }

    /**
     * Handle the Course "restored" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function restored(Course $course)
    {
        //
    }

    /**
     * Handle the Course "force deleted" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function forceDeleted(Course $course)
    {
        //
    }
}
