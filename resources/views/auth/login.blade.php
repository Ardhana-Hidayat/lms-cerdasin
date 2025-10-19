<x-guest-layout>
    <div class="flex min-h-screen flex-col items-center justify-center bg-white p-4">
        
        <div class="w-full max-w-md">
            
            {{-- Header Form --}}
            <div class="mb-8 text-center">
                <a href="/" class="inline-flex items-center gap-2">
                    <i class="fa-solid fa-graduation-cap text-purple-600 text-4xl"></i>
                    <span class="text-3xl font-bold text-gray-800">CerdasIn</span>
                </a>
                <p class="mt-2 text-gray-600">Selamat datang kembali! Silakan masuk ke akun Anda.</p>
            </div>

            {{-- Card Form --}}
            <div class="rounded-2xl border bg-white p-8 shadow-sm">
                
                <x-auth-session-status class="mb-4" :status="session('status')" />

                {{-- Form --}}
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="email" value="Email" class="font-semibold" />
                        <x-text-input 
                            id="email" 
                            class="mt-2 block w-full" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autofocus 
                            autocomplete="username" 
                            placeholder="contoh@email.com"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <x-input-label for="password" value="Kata Sandi" class="font-semibold" />
                            @if (Route::has('password.request'))
                                <a class="text-sm text-purple-600 hover:text-purple-800 hover:underline" href="{{ route('password.request') }}">
                                    Lupa kata sandi?
                                </a>
                            @endif
                        </div>
                        <x-text-input 
                            id="password" 
                            class="mt-2 block w-full" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password"
                            placeholder="Masukkan kata sandi"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500" name="remember">
                        <label for="remember_me" class="ms-2 block text-sm text-gray-700">
                            Ingat saya
                        </label>
                    </div>
                    
                    {{-- Tombol Submit --}}
                    <div>
                        <x-primary-button class="w-full justify-center bg-purple-600 py-3 text-sm hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-800">
                           Masuk
                        </x-primary-button>
                    </div>
                </form>

                {{-- Tautan Daftar --}}
                <p class="mt-8 text-center text-sm text-gray-600">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="font-semibold text-purple-600 hover:text-purple-800 hover:underline">
                        Daftar di sini
                    </a>
                </p>
            </div>

        </div>
    </div>
</x-guest-layout>