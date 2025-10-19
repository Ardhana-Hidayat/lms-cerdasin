<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full font-sans antialiased">
    <div x-data="{ sidebarOpen: false }" class="flex h-full">
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 flex flex-col w-64 bg-white border-r transform transition-transform duration-300 ease-in-out lg:relative lg:translate-x-0">
            <div class="flex items-center justify-center px-6 py-4 h-16 border-b">
                <h1 class="text-2xl font-bold text-purple-700">{{ config('app.name', 'CerdasIn') }}</h1>
            </div>

            <nav class="mt-4 px-4 space-y-2 text-sm font-medium flex-1">
                <a href="{{ route('teacher.dashboard') }}"
                    class="flex items-center gap-3 py-2.5 px-4 rounded-lg transition {{ request()->routeIs('teacher.dashboard') ? 'bg-purple-100 text-purple-700 font-semibold' : 'hover:bg-gray-100' }}">
                    <i class="fa-solid fa-chart-line w-5"></i>
                    Dashboard
                </a>
                <a href="{{ route('teacher.classes.index') }}"
                    class="flex items-center gap-3 py-2.5 px-4 rounded-lg transition {{ request()->routeIs('teacher.classes.*') ? 'bg-purple-100 text-purple-700 font-semibold' : 'hover:bg-gray-100' }}">
                    <i class="fa-solid fa-layer-group w-5"></i>
                    Kelas
                </a>
                <a href="{{ route('teacher.materials.index') }}"
                    class="flex items-center gap-3 py-2.5 px-4 rounded-lg transition {{ request()->routeIs('teacher.materials.*') ? 'bg-purple-100 text-purple-700 font-semibold' : 'hover:bg-gray-100' }}">
                    <i class="fa-solid fa-book-open w-5"></i>
                    Materi
                </a>
                <a href="{{ route('teacher.quizzes.index') }}"
                    class="flex items-center gap-3 py-2.5 px-4 rounded-lg transition {{ request()->routeIs('teacher.quizzes.*') ? 'bg-purple-100 text-purple-700 font-semibold' : 'hover:bg-gray-100' }}">
                    <i class="fa-solid fa-puzzle-piece w-5"></i>
                    Kuis
                </a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="flex items-center justify-between p-4 bg-white border-b h-16">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 lg:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <div class="flex items-center ml-auto">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                             <button class="inline-flex items-center gap-2 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=8b5cf6&color=fff" class="w-9 h-9 rounded-full border border-purple-200" alt="User Avatar">
                                <div class="hidden sm:block">{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                             <x-dropdown-link :href="route('profile.show')">
                                {{ __('Lihat Profil') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Edit Profil') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </header>

            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>