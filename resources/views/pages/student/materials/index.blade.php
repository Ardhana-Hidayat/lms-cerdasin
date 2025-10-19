@extends('layouts.student')

@section('title', 'Materi Belajar')

@section('content')
    <div class="space-y-6">
        <div class="max-w-6xl mx-auto bg-white rounded-xl border p-6">
            <div>
                <a href="{{ route('student.student.dashboard') }}"
                    class="inline-flex items-center text-slate-400 hover:text-slate-600 mb-4 font-medium transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
            </div>

            <div class="mb-6">
                <h1 class="text-2xl font-bold text-purple-700">
                    Mau Belajar Apa Hari Ini?
                </h1>
                <p class="text-gray-600 mt-1">
                    Berikut adalah daftar materi untuk kelas <span class="font-semibold">{{ $selectedClass->name }}</span>.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($materials as $material)
                <div
                    class="bg-white rounded-xl border p-6 overflow-hidden flex flex-col transition-all duration-300 hover:border hover:border-purple-300">
                    <div class="relative w-full h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $material->thumbnail) }}" alt="{{ $material->title }}"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="py-2 flex-grow">
                        <h2 class="text-lg font-bold text-gray-800 line-clamp-2 mb-2" title="{{ $material->title }}">
                            {{ $material->title }}
                        </h2>

                        <p class="text-sm text-gray-500 mb-3">
                            <i class="fa-regular fa-calendar-alt mr-1.5"></i>
                            Dibuat pada: {{ $material->created_at->format('d F Y') }}
                        </p>

                        <div class="text-gray-600 text-sm line-clamp-3">
                            {!! $material->content !!}
                        </div>
                    </div>

                    <div>
                        @if ($material->file_path)
                            <div class="flex flex-col sm:flex-row gap-3">
                                <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank"
                                    class="inline-flex items-center justify-center w-full gap-2 px-4 py-2 rounded-lg text-sm font-medium 
                                        bg-purple-600 text-white 
                                        hover:bg-purple-700 
                                        focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2
                                        transition-all duration-200">
                                    <i class="fa-solid fa-eye text-xs"></i>
                                    <span>Lihat</span>
                                </a>

                                <a href="{{ asset('storage/' . $material->file_path) }}" download
                                    class="inline-flex items-center justify-center w-full gap-2 px-4 py-2 rounded-lg text-sm font-medium
                                        bg-purple-50 text-purple-700 
                                        border border-purple-200 
                                        hover:bg-purple-100 
                                        focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2
                                        transition-all duration-200">
                                    <i class="fa-solid fa-download text-xs"></i>
                                    <span>Unduh</span>
                                </a>

                            </div>
                        @else
                            <span
                                class="inline-flex items-center justify-center w-full gap-2 bg-gray-200 text-gray-500 px-4 py-2 rounded-lg text-sm font-medium cursor-not-allowed">
                                <i class="fa-solid fa-eye text-xs"></i>
                                <span>Hanya Tampilan</span>
                            </span>
                        @endif
                    </div>
                </div>
            @empty
                <div
                    class="lg:col-span-3 md:col-span-2 border-l-4 border-yellow-500 bg-yellow-50 text-yellow-700 p-6 rounded-lg">
                    <p class="font-bold text-lg">Belum Ada Materi</p>
                    <p>Saat ini belum ada materi yang ditambahkan untuk kelas ini.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
