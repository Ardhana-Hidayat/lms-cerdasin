<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Quiz;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentQuizController extends Controller
{
    public function index()
    {
        $selectedClassId = session('selected_class');

        if (!$selectedClassId) {
            return redirect()->route('student.dashboard.index')
                ->with('error', 'Silakan pilih kelas terlebih dahulu.');
        }

        $selectedClass = Classroom::find($selectedClassId);

        $quizzes = Quiz::where('classroom_id', $selectedClassId)
                    ->withCount('questions') 
                    ->with('myScore')        
                    ->get();

        return view('pages.student.quizzes.index', compact('quizzes', 'selectedClass'));
    }

    public function show(Quiz $quiz)
    {
        $quiz->load('questions');

        return view('pages.student.quizzes.show', compact('quiz'));
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $request->validate([
            'answers' => 'required|array'
        ]);

        $correctAnswers = $quiz->questions()->pluck('correct_answer', 'id');

        $submittedAnswers = $request->input('answers');

        $correctCount = 0;
        $totalCount = $correctAnswers->count();

        foreach ($correctAnswers as $questionId => $correctAnswer) {
            if (isset($submittedAnswers[$questionId])) {
                if ($submittedAnswers[$questionId] == $correctAnswer) {
                    $correctCount++;
                }
            }
        }

        $scorePercentage = ($totalCount > 0) ? round(($correctCount / $totalCount) * 100) : 0;

        $score = Score::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id
            ],
            [
                'score' => $scorePercentage,
                'correct_count' => $correctCount,
                'total_count' => $totalCount
            ]
        );

        return redirect()->route('student.scores.show', $score->id);
    }
}
