<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;

class StudentScoreController extends Controller
{
    public function show(Score $score)
    {
        abort_if(Auth::id() != $score->user_id, 403, 'Akses ditolak');

        $score->load('quiz');

        return view('pages.student.scores.show', compact('score'));
    }
}
