<?php

use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Courses
    Route::get('/courses', [ProfileController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [ProfileController::class, 'show'])->name('courses.show');

    // Categories
    Route::get('/categories', [CourseCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{courseCategory}', [CourseCategoryController::class, 'show'])->name('categories.show');
});

Route::get('/about', function () {
    return view('dashboard');
})->name('about');

require __DIR__.'/auth.php';
