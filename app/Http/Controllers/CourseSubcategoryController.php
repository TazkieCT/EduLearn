<?php

namespace App\Http\Controllers;

use App\Models\CourseSubcategory;

class CourseSubcategoryController extends Controller
{
    public function show($categorySlug, $subcategorySlug)
    {
        $subcategory = CourseSubcategory::where('slug', $subcategorySlug)
            ->whereHas('category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            })
            ->with('courses')
            ->firstOrFail();

        $courses = $subcategory->courses;

        return view('subcategories.show', compact('subcategory', 'courses'));
    }
}
