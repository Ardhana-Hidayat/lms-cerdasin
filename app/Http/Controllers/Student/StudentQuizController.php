<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Quiz;
use Illuminate\Http\Request;

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

        // Ambil kuis DAN hitung jumlah pertanyaannya (questions_count)
        $quizzes = Quiz::where('classroom_id', $selectedClassId)
            ->withCount('questions') // Ini akan membuat $quiz->questions_count
            ->get();

        return view('pages.student.quizzes.index', compact('quizzes', 'selectedClass'));
    }
}
