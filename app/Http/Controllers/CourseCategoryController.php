<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    public function index()
    {
        $categories = CourseCategory::all();
        return view('categories.index', compact('categories'));
    }

    public function show(CourseCategory $courseCategory)
    {
        $subcategories = $courseCategory->subcategories()->with('courses')->get();

        return view('categories.show', compact('courseCategory', 'subcategories'));
    }
}
