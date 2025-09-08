<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Course;

class CourseCard extends Component
{
    public $course;

    /**
     * Create a new component instance.
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.course-card');
    }
}
