@extends('layouts.student')

@section('title', $material->title)

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('student.materials.index') }}"
                class="inline-flex items-center gap-2 text-slate-600 hover:text-purple-700 transition-colors">
                <i class="fa-solid fa-arrow-left text-sm"></i>
                <span>Kembali</span>
            </a>
        </div>

        <div class="bg-white rounded-xl border overflow-hidden">
            <img src="{{ asset('storage/' . ($material->thumbnail ?? 'thumbnails/default.png')) }}" alt="{{ $material->title }}"
                class="w-full h-128 object-cover">

            <div class="p-6 md:p-8">

                <div class="mb-4">
                    <span class="text-xs font-semibold uppercase text-purple-600 bg-purple-100 px-3 py-1 rounded-full">
                        {{ $material->classroom->name }}
                    </span>
                </div>

                <h1 class="text-3xl font-bold text-gray-900 mb-3">
                    {{ $material->title }}
                </h1>

                <p class="text-sm text-gray-500 mb-6">
                    <i class="fa-regular fa-calendar-alt mr-1.5"></i>
                    Dibuat pada: {{ $material->created_at->format('d F Y') }}
                </p>

                <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi/Isi Materi:</h3>
                <div class="prose prose-lg max-w-none text-gray-700">
                    {!! $material->material !!}
                </div>

                @if ($material->file_path)
                    <hr class="my-8">

                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Lampiran</h3>

                    <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank"
                        class="inline-flex items-center gap-2 mb-4 text-purple-700 font-medium hover:underline">
                        <i class="fa-solid fa-paperclip text-xs"></i>
                        <span>{{ basename($material->file_path) }}</span>
                    </a>

                    <div class="flex flex-col sm:flex-row gap-3 max-w-xs">
                        <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank"
                            class="inline-flex items-center justify-center w-full gap-2 px-4 py-2 rounded-lg text-sm font-medium bg-purple-600 text-white hover:bg-purple-700 transition-all duration-200">
                            <i class="fa-solid fa-eye text-xs"></i>
                            <span>Lihat</span>
                        </a>

                        <a href="{{ asset('storage/' . $material->file_path) }}" download
                            class="inline-flex items-center justify-center w-full gap-2 px-4 py-2 rounded-lg text-sm font-medium bg-purple-50 text-purple-700 border border-purple-200 hover:bg-purple-100 transition-all duration-200">
                            <i class="fa-solid fa-download text-xs"></i>
                            <span>Unduh</span>
                        </a>
                    </div>
                @else
                    <hr class="my-8">

                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Lampiran</h3>
                    <p class="text-gray-500 italic">Tidak ada lampiran.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
