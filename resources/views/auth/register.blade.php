<x-guest-layout>
    <div class="flex min-h-screen flex-col items-center justify-center bg-white p-4">

        <div class="w-full max-w-md">

            {{-- Header Form --}}
            <div class="mb-8 text-center">
                <a href="/" class="inline-flex items-center gap-2">
                    <i class="fa-solid fa-graduation-cap text-purple-600 text-4xl"></i>
                    <span class="text-3xl font-bold text-gray-800">CerdasIn</span>
                </a>
                <p class="mt-2 text-gray-600">Buat akun baru untuk memulai petualangan belajar Anda.</p>
            </div>

            {{-- Card Form --}}
            <div class="rounded-2xl border bg-white p-8 shadow-sm">

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="name" value="Nama Lengkap" class="font-semibold" />
                        <x-text-input 
                            id="name" 
                            class="mt-2 block w-full" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            required 
                            autofocus 
                            autocomplete="name"
                            placeholder="Masukkan nama lengkap Anda"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="email" value="Email" class="font-semibold" />
                        <x-text-input 
                            id="email" 
                            class="mt-2 block w-full" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autocomplete="username"
                            placeholder="contoh@email.com"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password" value="Kata Sandi" class="font-semibold" />
                        <x-text-input 
                            id="password" 
                            class="mt-2 block w-full" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="new-password"
                            placeholder="Buat kata sandi yang kuat"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi" class="font-semibold" />
                        <x-text-input 
                            id="password_confirmation" 
                            class="mt-2 block w-full" 
                            type="password"
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            placeholder="Ulangi kata sandi Anda"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    {{-- Tombol Submit --}}
                    <div>
                        <x-primary-button class="w-full justify-center bg-purple-600 py-3 text-sm hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-800">
                            Daftar
                        </x-primary-button>
                    </div>
                </form>

                {{-- Tautan Login --}}
                <p class="mt-8 text-center text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-semibold text-purple-600 hover:text-purple-800 hover:underline">
                        Masuk di sini
                    </a>
                </p>
            </div>

        </div>
    </div>
</x-guest-layout>