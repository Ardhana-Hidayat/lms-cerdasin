<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Quiz $quiz)
    {
        $questions = $quiz->questions;
        return view('pages.teacher.questions.index', compact('quiz', 'questions'));
    }

    public function create($quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        return view('pages.teacher.questions.create', compact('quiz'));
    }

    public function store(Request $request, $quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);

        $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|in:A,B,C,D',
        ]);

        Question::create([
            'quiz_id' => $quiz->id,
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'correct_answer' => $request->correct_answer,
        ]);

        return redirect()->route('teacher.quizzes.show', $quiz_id)
            ->with('success', 'Pertanyaan berhasil ditambahkan');
    }

    public function edit($quiz_id, $id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        $question = Question::findOrFail($id);

        return view('pages.teacher.questions.edit', compact('quiz', 'question'));
    }

    public function update(Request $request, $quiz_id, $id)
    {
        $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|in:A,B,C,D',
        ]);

        $question = Question::findOrFail($id);
        $question->update($request->all());

        return redirect()->route('teacher.quizzes.show', $quiz_id)
            ->with('success', 'Pertanyaan berhasil diperbarui');
    }

    public function destroy($quiz_id, $id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('teacher.quizzes.show', $quiz_id)
            ->with('success', 'Pertanyaan berhasil dihapus');
    }
}