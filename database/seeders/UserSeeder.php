<?php

namespace Database\Seeders;

use App\Models\User; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Budi Guru',
            'email' => 'teacher@example.com',
            'role' => 'teacher',
            'password' => Hash::make('guru12345'), 
        ]);

        User::create([
            'name' => 'Ardhana Syah H.',
            'email' => 'student@example.com',
            'role' => 'student',
            'password' => Hash::make('siswa12345'), 
        ]);
    }
}