<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;

class StudentScoreController extends Controller
{
    public function show(Score $score)
    {
        // PENTING: Pastikan siswa hanya bisa melihat nilainya sendiri
        abort_if(Auth::id() != $score->user_id, 403, 'Akses ditolak');

        // Ambil data kuis yang terkait dengan skor ini
        $score->load('quiz');

        // Tampilkan view hasil
        return view('pages.student.scores.show', compact('score'));
    }

    /**
     * (Opsional) Halaman untuk menampilkan SEMUA riwayat skor.
     */
    public function index()
    {
        // (Bisa Anda kembangkan nanti)
        // $scores = Score::where('user_id', Auth::id())->latest()->get();
        // return view('pages.student.scores.index', compact('scores'));
    }
}
