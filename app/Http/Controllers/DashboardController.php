<?php

namespace App\Http\Controllers;

use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $courses = Course::with('subcategory')->latest()->get();
        return view('dashboard', compact('courses'));
    }
}
