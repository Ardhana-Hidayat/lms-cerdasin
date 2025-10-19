@extends('layouts.teacher')

@section('title', 'Detail Kuis')

@section('content')
    <div>
        <div class="bg-white rounded-2xl p-6 border mb-6">
            <div>
                <a href="{{ route('teacher.quizzes.index') }}"
                    class="inline-flex items-center text-slate-400 hover:text-slate-600 mb-4 font-medium transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
            </div>
            <div class="flex flex-col md:flex-row justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">{{ $quiz->title }}</h1>
                    <p class="text-gray-600 mt-2">{{ $quiz->description ?? 'Tidak ada deskripsi.' }}</p>
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit"
                        class="bg-transparent border rounded-md p-2 hover:border-blue-400 hover:text-blue-400 transition">
                        <a href="{{ route('teacher.quizzes.edit', $quiz->id) }}">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </button>
                    <form action="{{ route('teacher.quizzes.destroy', $quiz->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-transparent border rounded-md p-2 hover:border-red-400 hover:text-red-400 transition">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                <h2 class="text-xl md:text-2xl font-semibold">Daftar Pertanyaan</h2>

                <a href="{{ route('teacher.quizzes.questions.create', $quiz->id) }}"
                    class="bg-purple-500 hover:bg-purple-600 text-white font-semibold py-2 px-4 rounded-lg transition">
                    <i class="fa-solid fa-plus mr-1"></i>Tambah Pertanyaan
                </a>
            </div>

            @if ($quiz->questions->isEmpty())
                <div class="text-center py-10 text-gray-500">
                    Belum ada pertanyaan untuk kuis ini.
                </div>
            @else
                <div class="overflow-x-auto rounded-lg border border-gray-100">
                    <table class="min-w-full text-sm text-gray-700">
                        <thead>
                            <tr>
                                <th class="py-3 px-6 text-left">No</th>
                                <th class="py-3 px-6 text-left">Pertanyaan</th>
                                <th class="py-3 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($quiz->questions as $index => $question)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="py-4 px-6">{{ $index + 1 }}</td>
                                    <td class="py-4 px-6">
                                        <p class="line-clamp-2">{{ $question->question }}</p>
                                    </td>
                                    <td class="p-3 text-center space-x-2">
                                        <a href="{{ route('teacher.quizzes.questions.edit', ['quiz' => $quiz->id, 'question' => $question->id]) }}"
                                            class="inline-flex items-center justify-center border rounded-md p-2 hover:border-blue-400 hover:text-blue-400 transition">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('teacher.quizzes.questions.destroy', ['quiz' => $quiz->id, 'question' => $question->id]) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center justify-center border rounded-md p-2 hover:border-red-400 hover:text-red-400 transition">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>
@endsection
