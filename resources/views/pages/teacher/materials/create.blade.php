@extends('layouts.teacher')

@section('title', 'Materi')

@section('content')
<div class="max-w-5xl bg-white shadow rounded-xl p-6 mx-auto">
    <h2 class="text-xl font-semibold mb-4 text-purple-700">Tambah Materi</h2>

    <form action="{{ route('teacher.materials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Grid 2 kolom -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Judul -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                    Judul Materi
                </label>
                <input type="text" name="title" id="title"
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400"
                    placeholder="Contoh: Materi Bangun Datar" value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kelas -->
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

            <!-- Thumbnail -->
            <div>
                <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">
                    Thumbnail (opsional)
                </label>
                <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400">
                @error('thumbnail')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- File Materi -->
            <div class="md:col-span-2">
                <label for="file_path" class="block text-sm font-medium text-gray-700 mb-1">
                    Upload File (PDF)
                </label>
                <input type="file" name="file_path" id="file_path"
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400">
                @error('file_path')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konten -->
            <div class="md:col-span-2">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">
                    Deskripsi Materi
                </label>
                <textarea name="material" id="material" rows="4"
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400"
                    placeholder="Masukkan isi atau deskripsi materi...">{{ old('material') }}</textarea>
                @error('material')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end gap-3 mt-8">
            <a href="{{ route('teacher.materials.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
            </a>

            <button type="submit"
                class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                <i class="fa-solid fa-check mr-1"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection