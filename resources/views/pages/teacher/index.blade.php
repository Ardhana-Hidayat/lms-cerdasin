@extends('layouts.teacher')

@section('title', 'Dashboard Guru')
@section('content')
<div>
    <h1 class="text-2xl font-bold text-purple-700 mb-4">Hai, {{ Auth::user()->name }}! 👋</h1>
    <p class="text-gray-600">Ini adalah halaman dashboard guru. Kamu bisa mengelola kelas dan materi di sini.</p>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
        <a href="{{ route('teacher.classes.index') }}"
            class="bg-white border rounded-xl p-6 flex flex-col items-center hover:border-purple-300 transition">
            <i class="fa-solid fa-users text-purple-600 text-3xl mb-2"></i>
            <h3 class="font-semibold">Kelola Kelas</h3>
        </a>

        <a href="{{ route('teacher.materials.index') }}"
            class="bg-white border rounded-xl p-6 flex flex-col items-center hover:border-purple-300 transition">
            <i class="fa-solid fa-book-open text-purple-600 text-3xl mb-2"></i>
            <h3 class="font-semibold">Kelola Materi</h3>
        </a>
    </div>
</div>
@endsection