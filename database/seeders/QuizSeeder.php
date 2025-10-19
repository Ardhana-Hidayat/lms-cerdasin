<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas1 = Classroom::where('name', 'Kelas 1')->first();

        if ($kelas1) {
            
            $kuisMatematika = Quiz::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Kuis Penjumlahan Dasar',
                'description' => 'Tes pemahaman penjumlahan angka 1-10.'
            ]);

            Question::create([
                'quiz_id' => $kuisMatematika->id,
                'question' => 'Berapa hasil dari 2 + 2?',
                'option_a' => '3',
                'option_b' => '4',
                'option_c' => '5',
                'option_d' => '6',
                'correct_answer' => 'b' 
            ]);

            Question::create([
                'quiz_id' => $kuisMatematika->id,
                'question' => 'Berapa hasil dari 5 + 3?',
                'option_a' => '7',
                'option_b' => '8',
                'option_c' => '9',
                'option_d' => '10',
                'correct_answer' => 'b'
            ]);

            Question::create([
                'quiz_id' => $kuisMatematika->id,
                'question' => 'Jika kamu punya 3 apel dan Budi memberimu 2 apel lagi, berapa apelmu sekarang?',
                'option_a' => '4',
                'option_b' => '5',
                'option_c' => '6',
                'option_d' => '3',
                'correct_answer' => 'b'
            ]);
        }
    }
}
