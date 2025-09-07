<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    // Tampilkan semua category (optional, bisa buat halaman list category)
    public function index()
    {
        $categories = CourseCategory::all();
        return view('categories.index', compact('categories'));
    }

    // Tampilkan detail category dan courses di dalamnya
    public function show(CourseCategory $courseCategory)
    {
        // Misal punya relasi courses di model CourseCategory
        $courses = $courseCategory->courses ?? collect(); 
        return view('categories.show', compact('courseCategory', 'courses'));
    }
}
