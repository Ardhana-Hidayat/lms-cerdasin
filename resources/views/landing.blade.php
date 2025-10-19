<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CerdasIn — Belajar Lebih Pintar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800 scroll-smooth">

    <!-- Navbar -->
    <header class="flex justify-between items-center px-6 py-4 bg-white shadow-sm fixed top-0 left-0 right-0 z-10">
        <h1 class="text-2xl font-bold text-purple-600">CerdasIn</h1>
        <nav class="hidden md:flex space-x-6 text-sm font-medium">
            <a href="#fitur" class="hover:text-purple-600 transition">Fitur</a>
            <a href="#tentang" class="hover:text-purple-600 transition">Tentang</a>
            <a href="#kontak" class="hover:text-purple-600 transition">Kontak</a>
        </nav>

        <a href="/login"
            class="hidden md:block bg-purple-600 text-white px-5 py-2 rounded-full text-sm font-semibold hover:bg-purple-700 transition">
            Masuk
        </a>
    </header>

    <!-- Hero Section -->
    <section class="min-h-screen flex flex-col justify-center items-center text-center px-6 bg-gradient-to-b from-white to-purple-50">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
            Belajar Jadi Lebih <span class="text-purple-600">Cerdas</span> Bersama CerdasIn
        </h2>
        <p class="text-gray-600 max-w-xl mb-8">
            Aplikasi pembelajaran interaktif untuk membantu siswa belajar dengan cara yang menyenangkan,
            efektif, dan terarah sesuai prinsip <strong>SDGs 4: Pendidikan Berkualitas</strong>.
        </p>
        <div class="flex space-x-4">
            <a href="/register"
                class="bg-purple-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-purple-700 transition">
                Daftar Sekarang
            </a>
            <a href="#fitur"
                class="border border-purple-600 text-purple-600 px-6 py-3 rounded-full font-semibold hover:bg-purple-50 transition">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </section>

    <!-- Fitur Section -->
    <section id="fitur" class="min-h-screen flex flex-col justify-center items-center py-16 px-6 bg-gradient-to-b from-purple-50 to-white">
        <h3 class="text-3xl font-bold mb-10 text-purple-700">Fitur Unggulan</h3>
        <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition border border-purple-100">
                <h4 class="font-semibold text-lg mb-2 text-purple-600">Kuis Interaktif</h4>
                <p class="text-gray-600 text-sm">Belajar jadi seru dengan soal interaktif dan penilaian otomatis.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition border border-purple-100">
                <h4 class="font-semibold text-lg mb-2 text-purple-600">Jadwal Belajar</h4>
                <p class="text-gray-600 text-sm">Atur waktu belajar agar lebih konsisten dan efisien setiap hari.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition border border-purple-100">
                <h4 class="font-semibold text-lg mb-2 text-purple-600">Materi Edukatif</h4>
                <p class="text-gray-600 text-sm">Akses materi pelajaran dan latihan soal sesuai tingkat belajar.</p>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="min-h-screen flex flex-col justify-center items-center bg-purple-50 px-6 text-center">
        <h3 class="text-3xl font-bold mb-6 text-purple-700">Tentang CerdasIn</h3>
        <p class="max-w-2xl mx-auto text-gray-600 leading-relaxed">
            CerdasIn adalah aplikasi pembelajaran berbasis web yang dirancang untuk membantu siswa belajar secara
            efektif dan menyenangkan. Kami percaya bahwa setiap anak berhak mendapatkan akses pendidikan berkualitas,
            sejalan dengan tujuan <strong>SDGs 4 – Quality Education</strong>.
        </p>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="min-h-screen flex flex-col justify-center items-center bg-purple-600 text-white text-center px-6">
        <h3 class="text-3xl font-bold mb-4">Hubungi Kami</h3>
        <p class="mb-6 max-w-md">Punya saran atau ingin berkolaborasi? Kami senang mendengarnya!</p>
        <a href="mailto:info@cerdasin.com"
            class="bg-white text-purple-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
            Kirim Email
        </a>
    </section>

    <!-- Footer -->
    <footer class="py-6 bg-white text-center text-sm text-gray-500 border-t">
        © {{ date('Y') }} <span class="font-semibold text-purple-600">CerdasIn</span>. Semua Hak Dilindungi.
    </footer>

</body>

</html>