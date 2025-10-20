@extends('layouts.student')

@section('title', 'Kerjakan Kuis: ' . $quiz->title)

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl sm:text-3xl font-bold text-purple-700">
                {{ $quiz->title }}
            </h1>
            <p class="text-gray-600 mt-1">
                {{ $quiz->description }}
            </p>
            <p class="text-sm text-purple-700 font-semibold mt-2">
                <i class="fa-solid fa-list-ol mr-1.5"></i>
                Total Soal: {{ $quiz->questions->count() }}
            </p>
        </div>

        <form method="POST" action="{{ route('student.quizzes.submit', $quiz->id) }}">
            @csrf

            <div class="space-y-6">
                @foreach ($quiz->questions as $index => $question)
                    <div class="bg-white rounded-xl border overflow-hidden">
                        <div class="p-5 bg-gray-50 border-b border-gray-200">
                            <h2 class="text-lg font-semibold">
                                Soal No. {{ $index + 1 }}
                            </h2>
                        </div>
                        
                        <div class="p-6">
                            <p class="text-base mb-5">
                                {{ $question->question }}
                            </p>

                            <div class="space-y-4">
                                @php
                                    $options = [
                                        'a' => $question->option_a,
                                        'b' => $question->option_b,
                                        'c' => $question->option_c,
                                        'd' => $question->option_d,
                                    ];
                                @endphp

                                @foreach ($options as $key => $text)
                                    <label for="q{{ $question->id }}_option_{{ $key }}" 
                                           class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-purple-50 transition-colors">
                                        <input type="radio" 
                                               name="answers[{{ $question->id }}]" 
                                               id="q{{ $question->id }}_option_{{ $key }}" 
                                               value="{{ $key }}"
                                               class="h-4 w-4 text-purple-600 border-gray-300 focus:ring-purple-500">
                                        <span class="ml-3 text-gray-700">{{ $text }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="mt-8">
                    <button type="submit" 
                            class="w-full inline-flex items-center justify-center gap-2 bg-purple-600 text-white px-6 py-3 rounded-lg text-base font-medium hover:bg-purple-700 transition-colors">
                        <i class="fa-solid fa-check-circle"></i>
                        <span>Selesai & Kirim Jawaban</span>
                    </button>
                </div>

            </div>
        </form>

    </div>
@endsection