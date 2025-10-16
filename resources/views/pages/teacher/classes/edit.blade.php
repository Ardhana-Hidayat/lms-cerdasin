@extends('layouts.teacher')

@section('title', 'Edit Kelas')

@section('content')
<div class="max-w-lg bg-white shadow rounded-xl p-6">

    <form action="{{ route('teacher.classes.update', $class->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Nama Kelas -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Kelas</label>
            <input type="text" name="name" id="name"
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-purple-400"
                value="{{ old('name', $class->name) }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol -->
        <div class="flex justify-end gap-3 mt-6">
            <a href="{{ route('teacher.classes.index') }}"
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
