@extends('layouts.student')

@section('title', 'Materi Belajar')

@section('content')
    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-md p-6">
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

        {{-- Header Halaman --}}
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-purple-700">
                Materi Belajar
            </h1>
            <p class="text-gray-600 mt-1">
                Berikut adalah daftar materi untuk kelas <span class="font-semibold">{{ $selectedClass->name }}</span>.
            </p>
        </div>

        {{-- Daftar Materi --}}
        <div class="space-y-4">
            @forelse ($materials as $material)
                <div classT="block border rounded-lg p-5 hover:bg-gray-50">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $material->title }}</h2>
                    <p class="text-sm text-gray-500 mb-3">
                        Dibuat pada: {{ $material->created_at->format('d F Y') }}
                    </p>
                    <div class="text-gray-700 prose">
                        {!! $material->content !!} {{-- Gunakan {!! !!} jika konten berisi HTML --}}
                    </div>

                    @if ($material->file_path)
                        <a href="{{ asset('storage/' . $material->file_path) }}"
                            class="inline-block mt-4 bg-purple-600 text-white px-3 py-1 rounded-md text-sm hover:bg-purple-700"
                            target="_blank">
                            Unduh Lampiran
                        </a>
                    @endif
                </div>
            @empty
                {{-- Tampilan jika tidak ada materi --}}
                <div class="border-l-4 border-yellow-500 bg-yellow-50 text-yellow-700 p-4 rounded-lg">
                    <p class="font-bold">Belum Ada Materi</p>
                    <p>Saat ini belum ada materi yang ditambahkan untuk kelas ini.</p>
                </div>
            @endforelse
        </div>

    </div>
@endsection
