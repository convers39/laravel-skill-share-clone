<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Course;

class CourseCard extends Component
{
    public $course;
    public $columns;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($course, $columns)
    {
        $this->course = $course;
        $this->columns = $columns;
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
