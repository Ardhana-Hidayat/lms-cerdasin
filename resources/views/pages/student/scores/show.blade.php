@extends('layouts.student')

@section('title', 'Hasil Kuis: ' . $score->quiz->title)

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="bg-white rounded-xl border p-6 md:p-10 text-center">
            <div class="mb-6">
                <i class="fa-solid fa-trophy text-6xl text-yellow-400"></i>
                <h1 class="text-3xl font-bold text-gray-800 mt-4">Kuis Selesai!</h1>
                <p class="text-lg text-gray-600 mt-1">
                    <span class="font-semibold text-purple-700">{{ $score->quiz->title }}</span>
                </p>
            </div>

            <div class="mb-8">
                <p class="text-base text-gray-500">Skor Kamu:</p>
                <h2 class="text-6xl font-bold text-purple-600 my-2">
                    {{ $score->score }}
                    <span class="text-2xl text-gray-500">/ 100</span>
                </h2>

                <div class="flex justify-center gap-6 mt-4">
                    <div class="text-gray-700">
                        <span class="block text-xl font-semibold">{{ $score->correct_count }}</span>
                        <span class="text-sm text-gray-500">Jawaban Benar</span>
                    </div>
                    <div class="text-gray-700">
                        <span class="block text-xl font-semibold">{{ $score->total_count }}</span>
                        <span class="text-sm text-gray-500">Total Soal</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('student.quizzes.index') }}"
                    class="inline-flex items-center justify-center w-full sm:w-auto gap-2 bg-purple-50 text-purple-700 border border-purple-200 px-5 py-3 rounded-lg text-sm font-medium hover:bg-purple-100 transition-colors">
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                    <span>Kembali ke Daftar Kuis</span>
                </a>
                <a href="{{ route('student.student.dashboard') }}"
                    class="inline-flex items-center justify-center w-full sm:w-auto gap-2 bg-purple-600 text-white px-5 py-3 rounded-lg text-sm font-medium hover:bg-purple-700 transition-colors">
                    <i class="fa-solid fa-chart-line text-xs"></i>
                    <span>Kembali ke Dashboard</span>
                </a>
            </div>

        </div>
    </div>
@endsection
