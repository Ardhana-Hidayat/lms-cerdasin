<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\StudentMaterialController;
use App\Http\Controllers\Student\StudentQuizController;
use App\Http\Controllers\Teacher\ClassController;
use App\Http\Controllers\Teacher\MaterialController;
use App\Http\Controllers\Teacher\QuestionController;
use App\Http\Controllers\Teacher\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role == 'teacher') {
        return redirect()->route('teacher.student.dashboard');
    } elseif (auth()->user()->role == 'student') {
        return redirect()->route('student.student.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/details', [ProfileController::class, 'show'])->name('profile.show');
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
    Route::resource('quizzes', StudentQuizController::class)->only(['index', 'show']);
});

require __DIR__ . '/auth.php';