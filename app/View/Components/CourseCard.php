<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Course;

class CourseCard extends Component
{
    public $course;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
        $this->title = $course->title;
        $this->desc = $course->desc;
        $this->cover_img = $course->cover_img;

        // 'published',
        // 'tags',
        // 'video_count',
        // 'save_count',
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.course-card');
    }
}
