@extends('layouts.teacher')

@section('title', 'Pertanyaan')

@section('content')
    <div>
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-purple-700">Daftar Pertanyaan Kuis</h1>
            <a href="{{ route('teacher.questions.create', $quiz->id) }}"
                class="text-center bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700 transition">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        <div class="bg-white shadow rounded-xl p-4">
            @if ($questions->isEmpty())
                <p class="text-gray-500 text-center py-6">Belum ada pertanyaan yang ditambahkan.</p>
            @else
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="p-3">No</th>
                            <th class="p-3">Pertanyaan</th>
                            <th class="p-3">Jawaban Benar</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $index => $question)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3 font-medium">{{ $index + 1 }}</td>
                                <td class="p-3 font-medium">{{ Str::limit($question->question, 60) }}</td>
                                <td class="p-3 font-medium text-center">{{ $question->correct_answer }}</td>
                                <td class="p-3 text-center space-x-2">
                                    <a href="{{ route('teacher.questions.edit', $questions->id) }}"
                                        class="inline-flex items-center justify-center border rounded-md p-2 hover:border-blue-400 hover:text-blue-400 transition">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('teacher.questions.destroy', $questions->id) }}" method="POST"
                                        class="inline">
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
            @endif
        </div>
    </div>
@endsection
