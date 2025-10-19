<?php

use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\StudentMaterialController;
use App\Http\Controllers\Teacher\ClassController;
use App\Http\Controllers\Teacher\MaterialController;
use App\Http\Controllers\Teacher\QuestionController;
use App\Http\Controllers\Teacher\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/teacher/dashboard', fn() => view('pages.teacher.index'))->name('teacher.dashboard');
    Route::get('/student/dashboard', fn() => view('pages.student.index'))->name('student.dashboard');
});

Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('dashboard', fn() => view('pages.teacher.index'))->name('teacher.dashboard');
    Route::resource('classes', ClassController::class);
    Route::resource('materials', MaterialController::class);
    Route::resource('quizzes', QuizController::class);
    // Route::resource('questions', QuestionController::class);
    Route::resource('quizzes.questions', QuestionController::class);
});

Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::resource('classes', StudentController::class);
    Route::resource('materials', StudentMaterialController::class)->only(['index']);
});

require __DIR__.'/auth.php';