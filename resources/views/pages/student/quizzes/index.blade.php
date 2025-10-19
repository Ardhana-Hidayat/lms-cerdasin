@extends('layouts.student')

@section('title', 'Daftar Kuis')

@section('content')
    <div class="max-w-6xl mx-auto p-4 sm:p-6">

        {{-- Header Halaman --}}
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-purple-700">
                    Daftar Kuis
                </h1>
                <p class="text-gray-600 mt-1">
                    Kerjakan kuis yang tersedia untuk kelas 
                    <span class="font-semibold">{{ $selectedClass->name }}</span>.
                </p>
            </div>
            
            {{-- Tombol Kembali ke Dashboard --}}
            <a href="{{ route('student.student.dashboard') }}" 
               class="inline-flex items-center gap-2 bg-gray-100 text-gray-800 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-200 mt-4 sm:mt-0">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                Kembali ke Dashboard
            </a>
        </div>

        {{-- Daftar Kuis --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            @forelse ($quizzes as $quiz)
                {{-- Card Kuis --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col group transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    
                    {{-- Card Header: Ikon --}}
                    <div class="relative w-full h-40 bg-purple-600 flex items-center justify-center">
                        <i class="fa-solid fa-puzzle-piece text-white text-6xl opacity-70"></i>
                    </div>

                    {{-- Card Body --}}
                    <div class="p-5 flex-grow">
                        
                        {{-- Judul --}}
                        <h2 class="text-xl font-bold text-gray-800 line-clamp-2 mb-2" title="{{ $quiz->title }}">
                            {{ $quiz->title }}
                        </h2>
                        
                        {{-- Deskripsi --}}
                        <p class="text-sm text-gray-600 line-clamp-3 mb-4">
                            {{ $quiz->description }}
                        </p>

                        {{-- Info Jumlah Soal --}}
                        <div class="text-sm font-semibold text-purple-700">
                            <i class="fa-solid fa-list-ol mr-1.5"></i>
                            {{ $quiz->questions_count }} Soal
                        </div>
                    </div>

                    {{-- Card Footer: Tombol Aksi --}}
                    <div class="p-4 border-t border-gray-100 bg-gray-50">
                        {{-- Tombol ini akan mengarah ke halaman detail/pengerjaan kuis --}}
                        <a href="#" {{-- Nanti akan kita ubah ke route('student.quizzes.show', $quiz->id) --}}
                           class="inline-flex items-center justify-center w-full gap-2 bg-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-purple-700 transition-colors">
                            <i class="fa-solid fa-play text-xs"></i>
                            <span>Mulai Kuis</span>
                        </a>
                    </div>
                </div>
            @empty
                {{-- Tampilan jika tidak ada kuis --}}
                <div class="lg:col-span-3 md:col-span-2 border-l-4 border-yellow-500 bg-yellow-50 text-yellow-700 p-6 rounded-lg">
                    <p class="font-bold text-lg">Belum Ada Kuis</p>
                    <p>Saat ini belum ada kuis yang ditambahkan untuk kelas ini.</p>
                </div>
            @endforelse
            
        </div>
    </div>
@endsection