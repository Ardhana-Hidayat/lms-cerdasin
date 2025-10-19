<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Teacher\ClassController;
use App\Http\Controllers\Teacher\MaterialController;
use App\Http\Controllers\Teacher\QuizController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('landing');
});

// Main Dashboard (Redirects based on role)
Route::get('/dashboard', function () {
    if (auth()->user()->role == 'teacher') {
        return redirect()->route('teacher.dashboard');
    } elseif (auth()->user()->role == 'student') {
        return redirect()->route('student.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


// General Authenticated Routes
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/details', [ProfileController::class, 'show'])->name('profile.show');
});


// Teacher Routes
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.teacher.index');
    })->name('dashboard');

    Route::resource('classes', ClassController::class);
    Route::resource('materials', MaterialController::class);
    Route::resource('quizzes', QuizController::class);
});

// Student Routes
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.student.index');
    })->name('dashboard');
});


// Include Auth Routes
require __DIR__ . '/auth.php';