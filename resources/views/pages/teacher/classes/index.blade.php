@extends('layouts.teacher')

@section('title', 'Kelas')

@section('content')
    <div>
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-purple-700">Daftar Kelas</h1>
            <a href="{{ route('teacher.classes.create') }}"
                class="text-center bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700 transition">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        <div class="bg-white shadow rounded-xl p-4">
            @if ($classes->isEmpty())
                <p class="text-gray-500 text-center py-6">Belum ada kelas yang ditambahkan.</p>
            @else
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="p-3">No</th>
                            <th class="p-3">Nama Kelas</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $index => $class)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3 font-medium">{{ $index + 1 }}</td>
                                <td class="p-3 font-medium">{{ $class->name }}</td>
                                <td class="p-3 text-center">
                                    <button type="submit"
                                        class="bg-transparent border rounded-md p-2 hover:border-blue-400 hover:text-blue-400 transition">
                                        <a href="{{ route('teacher.classes.edit', $class->id) }}">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </button>
                                    <form action="{{ route('teacher.classes.destroy', $class->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-transparent border rounded-md p-2 hover:border-red-400 hover:text-red-400 transition">
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
