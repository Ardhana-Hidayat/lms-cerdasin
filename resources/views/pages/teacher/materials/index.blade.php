@extends('layouts.teacher')

@section('title', 'Materi')

@section('content')
    <div>
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-purple-700">Daftar Materi</h1>
            <a href="{{ route('teacher.materials.create') }}"
                class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700 transition">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        <div class="bg-white border rounded-xl p-4">
            @if ($materials->isEmpty())
                <p class="text-gray-500 text-center py-6">Belum ada materi yang ditambahkan.</p>
            @else
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="p-3">No</th>
                            <th class="p-3">Thumbnail</th>
                            <th class="p-3">Judul</th>
                            <th class="p-3">Kelas</th>
                            <th class="p-3">File</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materials as $index => $m)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3 font-medium">{{ $index + 1 }}</td>

                                <!-- Thumbnail -->
                                <td class="p-3">
                                    @if ($m->thumbnail)
                                        <img src="{{ asset('storage/' . $m->thumbnail) }}"
                                            alt="Thumbnail {{ $m->title }}"
                                            class="w-16 h-16 object-cover rounded-lg shadow-sm border">
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada</span>
                                    @endif
                                </td>

                                <!-- Judul -->
                                <td class="p-3 font-medium text-gray-800">{{ $m->title }}</td>
                                <td class="p-3">
                                    {{ $m->classroom ? $m->classroom->name : '-' }}
                                </td>

                                <!-- File -->
                                <td class="p-3">
                                    @if ($m->file_path)
                                        <a href="{{ asset('storage/' . $m->file_path) }}" target="_blank"
                                            class="text-blue-600">
                                            <i class="fa-solid fa-file"></i> Lihat File
                                        </a>
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada file</span>
                                    @endif
                                </td>

                                <!-- Aksi -->
                                <td class="p-3 text-center space-x-2">
                                    <a href="{{ route('teacher.materials.edit', $m->id) }}"
                                        class="inline-flex items-center justify-center border rounded-md p-2 hover:border-blue-400 hover:text-blue-400 transition">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <button type="submit"
                                        class="bg-transparent border rounded-md p-2 hover:border-blue-400 hover:text-blue-400 transition">
                                        <a href="{{ route('teacher.materials.show', $m->id) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </button>
                                    <form action="{{ route('teacher.materials.destroy', $m->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center justify-center border rounded-md p-2 hover:border-red-400 hover:text-red-400 transition">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
