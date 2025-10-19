@extends('layouts.teacher')

@section('title', 'Edit Pertanyaan')

@section('content')
<div class="max-w-5xl bg-white border rounded-xl p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-purple-700">Edit Pertanyaan</h1>
        <a href="{{ route('teacher.quizzes.show', $quiz->id) }}"
           class="text-center bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300 transition">
            <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    {{-- Form --}}
    <form action="{{ route('teacher.quizzes.questions.update', [$quiz->id, $question->id]) }}" 
          method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @csrf
        @method('PUT')

        {{-- Pertanyaan --}}
        <div class="col-span-2">
            <label for="question" class="block text-sm font-medium text-gray-700 mb-1">
                Pertanyaan
            </label>
            <textarea name="question" id="question" rows="3"
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400"
                placeholder="Masukkan teks pertanyaan..." required>{{ old('question', $question->question) }}</textarea>
            @error('question')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Pilihan A --}}
        <div>
            <label for="option_a" class="block text-sm font-medium text-gray-700 mb-1">Pilihan A</label>
            <input type="text" name="option_a" id="option_a"
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400"
                placeholder="Masukkan opsi A" value="{{ old('option_a', $question->option_a) }}" required>
            @error('option_a')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Pilihan B --}}
        <div>
            <label for="option_b" class="block text-sm font-medium text-gray-700 mb-1">Pilihan B</label>
            <input type="text" name="option_b" id="option_b"
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400"
                placeholder="Masukkan opsi B" value="{{ old('option_b', $question->option_b) }}" required>
            @error('option_b')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Pilihan C --}}
        <div>
            <label for="option_c" class="block text-sm font-medium text-gray-700 mb-1">Pilihan C</label>
            <input type="text" name="option_c" id="option_c"
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400"
                placeholder="Masukkan opsi C" value="{{ old('option_c', $question->option_c) }}" required>
            @error('option_c')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Pilihan D --}}
        <div>
            <label for="option_d" class="block text-sm font-medium text-gray-700 mb-1">Pilihan D</label>
            <input type="text" name="option_d" id="option_d"
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400"
                placeholder="Masukkan opsi D" value="{{ old('option_d', $question->option_d) }}" required>
            @error('option_d')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Jawaban Benar --}}
        <div class="col-span-2">
            <label for="correct_answer" class="block text-sm font-medium text-gray-700 mb-1">
                Jawaban Benar
            </label>
            <select name="correct_answer" id="correct_answer"
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400" required>
                <option value="">-- Pilih Jawaban Benar --</option>
                <option value="A" {{ old('correct_answer', $question->correct_answer) == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ old('correct_answer', $question->correct_answer) == 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ old('correct_answer', $question->correct_answer) == 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ old('correct_answer', $question->correct_answer) == 'D' ? 'selected' : '' }}>D</option>
            </select>
            @error('correct_answer')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol Aksi --}}
        <div class="col-span-2 flex justify-end mt-6 gap-3">
            <a href="{{ route('teacher.quizzes.show', $quiz->id) }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                <i class="fa-solid fa-arrow-left mr-1"></i> Batal
            </a>
            <button type="submit"
                class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                <i class="fa-solid fa-save mr-1"></i> Perbarui
            </button>
        </div>
    </form>
</div>
@endsection
