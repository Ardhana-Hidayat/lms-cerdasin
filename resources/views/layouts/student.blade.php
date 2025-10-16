<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CerdasIn | Dashboard</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-slate-700 flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">

    <!-- Sidebar -->
    <aside
        class="fixed inset-y-0 left-0 w-64 bg-white flex flex-col justify-between transform transition-transform duration-300 ease-in-out z-20
           lg:translate-x-0 lg:static lg:inset-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

        <!-- Header -->
        <div>
            <div class="flex justify-center items-center px-6 py-4 border-b border-gray-100">
                <h1 class="text-2xl font-bold flex items-center space-x-2">
                    <i class="fa-solid fa-graduation-cap text-purple-600"></i>
                    <span>CerdasIn</span>
                </h1>
                <button @click="sidebarOpen = false" class="lg:hidden text-gray-600 focus:outline-none text-lg ml-auto">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Main Navigation -->
            <nav class="mt-4 px-4 space-y-2 text-sm font-medium">
                <a href="/" class="flex items-center gap-3 py-2.5 px-4 rounded-lg hover:bg-gray-100 transition">
                    <i class="fa-solid fa-chart-line w-5 text-purple-600"></i>
                    Dashboard
                </a>
                <a href="/materi" class="flex items-center gap-3 py-2.5 px-4 rounded-lg hover:bg-gray-100 transition">
                    <i class="fa-solid fa-book-open w-5 text-purple-600"></i>
                    Materi
                </a>
                <a href="/kuis" class="flex items-center gap-3 py-2.5 px-4 rounded-lg hover:bg-gray-100 transition">
                    <i class="fa-solid fa-puzzle-piece w-5 text-purple-600"></i>
                    Kuis
                </a>
            </nav>
        </div>

        <!-- Logout (Always at Bottom) -->
        <div class="px-4 py-4 border-t text-sm font-semibold border-gray-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-start gap-3 py-2.5 px-4 rounded-lg text-red-400 hover:text-red-500 hover:bg-red-50 transition">
                    <i class="fa-solid fa-right-from-bracket w-5"></i>
                    Keluar
                </button>
            </form>
        </div>

    </aside>

    <!-- Overlay untuk mobile -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/40 z-10 lg:hidden"></div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-full overflow-hidden">

        <!-- Header -->
        <header class="flex justify-between items-center bg-white px-6 py-4 shadow-sm sticky top-0 z-10">
            <div class="flex items-center space-x-4">
                <!-- Burger Menu -->
                <button @click="sidebarOpen = true" class="lg:hidden text-slate-700 focus:outline-none text-2xl">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <h2 class="text-xl font-semibold text-slate-700">@yield('title', 'Dashboard')</h2>
            </div>

            <div class="flex items-center space-x-4">
                <span class="hidden sm:block text-sm text-gray-700">Halo, <strong>Ardhana</strong></span>
                <img src="https://ui-avatars.com/api/?name=Ardhana&background=8b5cf6&color=fff"
                    class="w-9 h-9 rounded-full border border-purple-200" alt="User Avatar">
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
            @yield('content')
        </main>

    </div>

</body>

</html>
