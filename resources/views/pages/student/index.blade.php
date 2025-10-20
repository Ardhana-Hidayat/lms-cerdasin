@extends('layouts.student')

@section('title', 'Dashboard Siswa')

@section('content')
    <div class="max-w-6xl mx-auto space-y-6">

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg relative mb-5"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-purple-700">
                    Hai, {{ Auth::user()->name }}! 👋
                </h1>
                <p class="text-gray-600 mt-1">
                    Selamat datang di dashboard siswa.
                    @if (!$selectedClass)
                        Silakan pilih kelas untuk memulai.
                    @endif
                </p>
            </div>
        </div>

        <div class="bg-white rounded-xl border p-6">
            @if ($selectedClass)
                <div class="bg-purple-100 border border-purple-300 text-purple-800 p-4 rounded-xl mb-5">
                    <p class="font-medium">
                        <span class="font-semibold">{{ $selectedClass->name }}</span>
                    </p>
                </div>
            @endif

            <h2 class="text-lg font-semibold mb-3">
                {{ $selectedClass ? 'Ganti Kelas' : 'Pilih Kelas' }}
            </h2>

            <form method="POST" action="{{ route('student.classes.store') }}">
                @csrf
                <div class="flex flex-wrap gap-3">
                    @foreach ($classes as $class)
                        <button type="submit" name="class_id" value="{{ $class->id }}"
                            class="px-4 py-2 rounded-lg border transition-colors duration-200
                                {{ session('selected_class') == $class->id
                                    ? 'bg-purple-600 text-white border-purple-600 font-semibold'
                                    : 'bg-purple-100 text-purple-500 hover:bg-purple-50' }}">
                            {{ $class->name }}
                        </button>
                    @endforeach
                </div>
            </form>
        </div>

        <div>
            <h2 class="text-lg font-semibold mb-3">Menu Cepat</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @php
                    $menuClass = $selectedClass
                        ? 'group flex flex-col bg-white items-center justify-center p-6 rounded-xl border hover:border-purple-300 transition'
                        : 'group flex flex-col bg-white items-center justify-center p-6 bg-gray-100 rounded-xl border cursor-not-allowed opacity-60';
                    $menuTag = $selectedClass ? 'a' : 'div';
                @endphp

                <{{ $menuTag }} @if ($selectedClass) href="#" @endif class="{{ $menuClass }}">
                    <div class="text-3xl mb-2 {{ $selectedClass ? 'text-purple-500' : '' }}"> <i
                            class="fa-solid fa-book-open"></i> </div>
                    <h3 class="text-lg font-semibold {{ $selectedClass ? 'text-slate-600' : '' }}">
                        Materi</h3>
                    <p class="text-sm {{ $selectedClass ? 'text-gray-500' : '' }} mt-1">Lihat dan pelajari semua materi
                        dari guru.</p>
                    </{{ $menuTag }}>

                    <{{ $menuTag }} @if ($selectedClass) href="#" @endif class="{{ $menuClass }}">
                        <div class="text-3xl mb-2 {{ $selectedClass ? 'text-purple-500' : '' }}"> <i
                                class="fa-solid fa-question-circle"></i> </div>
                        <h3 class="text-lg font-semibold {{ $selectedClass ? 'text-slate-600' : '' }}">
                            Kuis</h3>
                        <p class="text-sm {{ $selectedClass ? 'text-gray-500' : '' }} mt-1">Kerjakan kuis untuk mengasah
                            kemampuanmu.</p>
                        </{{ $menuTag }}>

                        <{{ $menuTag }} @if ($selectedClass) href="#" @endif
                            class="{{ $menuClass }}">
                            <div class="text-3xl mb-2 {{ $selectedClass ? 'text-purple-500' : '' }}"> <i
                                    class="fa-solid fa-chart-line"></i> </div>
                            <h3 class="text-lg font-semibold {{ $selectedClass ? 'text-slate-600' : '' }}">
                                Nilai</h3>
                            <p class="text-sm {{ $selectedClass ? 'text-gray-500' : '' }} mt-1">Lihat hasil belajar dan
                                progres kamu.</p>
                            </{{ $menuTag }}>
            </div>
        </div>
    </div>
@endsection
