@extends('layouts.student')

@section('title', 'Daftar Kuis')

@section('content')
    <div class="space-y-6">
        <div class="max-w-6xl mx-auto">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-purple-700">
                    Ayo Asah Kemampuanmu dengan Mengerjakan Kuis!
                </h1>
                <p class="text-gray-600 mt-1">
                    Berikut adalah daftar kuis untuk <span
                        class="font-semibold text-purple-500">{{ $selectedClass->name }}</span>.
                </p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($quizzes as $quiz)
            <div
                class="bg-white rounded-xl border overflow-hidden flex flex-col group transition-all duration-300 hover:-translate-y-1 hover:border-purple-300">

                <div class="relative w-full h-40 bg-purple-600 flex items-center justify-center">
                    <i class="fa-solid fa-puzzle-piece text-white text-6xl opacity-70"></i>
                </div>

                <div class="p-6 flex-grow">
                    <h2 class="text-xl font-bold text-gray-800 line-clamp-2 mb-2" title="{{ $quiz->title }}">
                        {{ $quiz->title }}
                    </h2>

                    <p class="text-sm text-gray-600 line-clamp-3 mb-4">
                        {{ $quiz->description }}
                    </p>

                    <div class="text-sm font-semibold text-purple-700">
                        <i class="fa-solid fa-list-ol mr-1.5"></i>
                        {{ $quiz->questions_count }} Soal
                    </div>
                </div>

                <div class="p-4 border-t">
                    @if ($quiz->myScore)
                        <div class="text-center">
                            <p class="text-sm text-gray-500 mb-1">Skor Kamu:</p>
                            <p class="text-2xl font-bold text-purple-600">
                                {{ $quiz->myScore->score }} <span class="text-base text-gray-400">/ 100</span>
                            </p>

                            <a href="{{ route('student.scores.show', $quiz->myScore->id) }}"
                                class="mt-3 inline-flex items-center justify-center w-full gap-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-300 transition-colors">
                                <i class="fa-solid fa-eye text-xs"></i>
                                <span>Lihat Hasil</span>
                            </a>

                        </div>
                    @else
                        <a href="{{ route('student.quizzes.show', $quiz->id) }}"
                            class="inline-flex items-center justify-center w-full gap-2 bg-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-purple-700 transition-colors">
                            <i class="fa-solid fa-play text-xs"></i>
                            <span>Mulai Kuis</span>
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div
                class="lg:col-span-3 md:col-span-2 border-l-4 border-yellow-500 bg-yellow-50 text-yellow-700 p-6 rounded-lg">
                <p class="font-bold text-lg">Belum Ada Kuis</p>
                <p>Saat ini belum ada kuis yang ditambahkan untuk kelas ini.</p>
            </div>
        @endforelse
    </div>
@endsection
