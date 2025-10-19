<?php

namespace Database\Seeders;

use App\Models\Classroom; 
use App\Models\Material; 
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas1 = Classroom::where('name', 'Kelas 1')->first();

        if ($kelas1) {
            
            Material::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Belajar Membaca: Huruf A, B, C',
                'material' => '<p>Hari ini kita akan belajar mengenal dan mengucapkan huruf <strong>A</strong>, <strong>B</strong>, dan <strong>C</strong>.</p><ul><li>A untuk Apel</li><li>B untuk Bola</li><li>C untuk Cicak</li></ul>',
                'thumbnail' => 'thumbnails/dummy-thumbnail.jpg',
                'file_path' => 'materials/dummy-file.pdf',
            ]);

            Material::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Berhitung Angka 1 sampai 5',
                'material' => '<p>Mari kita berhitung bersama-sama!</p><p>Satu, Dua, Tiga, Empat, Lima.</p><p>Lihat, ada 5 jari di tanganmu!</p>',
                'thumbnail' => 'thumbnails/dummy-thumbnail.jpg',
                'file_path' => 'materials/dummy-file.pdf',
            ]);

            Material::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Mengenal Warna Primer',
                'material' => '<p>Ada tiga warna dasar yang harus kamu tahu:</p><ol><li>Merah (seperti api)</li><li>Kuning (seperti matahari)</li><li>Biru (seperti langit)</li></ol>',
                'thumbnail' => 'thumbnails/dummy-thumbnail.jpg',
                'file_path' => 'materials/dummy-file.pdf',
            ]);
        }
    }
}