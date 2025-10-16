@extends('layouts.teacher')

@section('title', 'Kuis')

@section('content')
    <div class="max-w-lg bg-white shadow rounded-xl p-6">
        <h2 class="text-xl font-semibold mb-4 text-purple-700">Tambah Kuis</h2>
        <form action="{{ route('teacher.quizzes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                        Judul Kuis
                    </label>
                    <input type="text" name="title" id="title"
                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400"
                        placeholder="Contoh: Kuis Perkalian Dasar" value="{{ old('title') }}" required>
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1">
                        Deskripsi
                    </label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400"
                        placeholder="Masukkan isi atau deskripsi materi...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="classroom_id" class="block text-sm font-medium text-gray-700 mb-1">
                        Pilih Kelas
                    </label>
                    <select name="classroom_id" id="classroom_id"
                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}" {{ old('classroom_id') == $class->id ? 'selected' : '' }}>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('classroom_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end gap-3 mt-8">
                <a href="{{ route('teacher.quizzes.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
                </a>

                <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                    <i class="fa-solid fa-check mr-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
