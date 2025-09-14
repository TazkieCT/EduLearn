<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('category', 'creator')
            ->latest()
            ->paginate(12);
        
        return view('courses.index', compact('courses'));
    }


    public function show(Course $course)
    {
        // Load relationships for safety (category + creator)
        $course->load('category', 'creator');

        return view('courses.show', compact('course'));
    }
}
