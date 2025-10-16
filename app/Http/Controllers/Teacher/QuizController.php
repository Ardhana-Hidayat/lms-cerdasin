<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('classroom')->latest()->get();
        return view('pages.teacher.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $classes = Classroom::all();
        return view('pages.teacher.quizzes.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        Quiz::create([
            'title' => $request->title,
            'description' => $request->title,
            'classroom_id' => $request->classroom_id,
        ]);

        return redirect()->route('teacher.quizzes.index')->with('success', 'Kuis berhasil ditambahkan.');
    }

    public function edit(Quiz $quiz)
    {
        $classes = Classroom::all();
        return view('pages.teacher.quizzes.edit', compact('quiz', 'classes'));
    }

    public function show(Quiz $quiz)
    {
        $classes = Classroom::all();
        return view('pages.teacher.quizzes.show', compact('quiz', 'classes'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $quiz->update($request->only('title', 'description', 'classroom_id'));

        return redirect()->route('teacher.quizzes.index')->with('success', 'Kuis berhasil diperbarui.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return back()->with('success', 'Kuis berhasil dihapus.');
    }
}