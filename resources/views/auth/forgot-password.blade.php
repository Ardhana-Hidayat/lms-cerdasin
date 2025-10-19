<x-guest-layout>
    <div class="flex min-h-screen flex-col items-center justify-center bg-white p-4">
        
        <div class="w-full max-w-md">
            
            {{-- Header Form --}}
            <div class="mb-8 text-center">
                <a href="/" class="inline-flex items-center gap-2">
                    <i class="fa-solid fa-graduation-cap text-purple-600 text-4xl"></i>
                    <span class="text-3xl font-bold text-gray-800">CerdasIn</span>
                </a>
            </div>

            {{-- Card Form --}}
            <div class="rounded-2xl border bg-white p-8 shadow-sm">
                <div class="mb-6 text-left">
                    <h2 class="text-xl font-bold text-gray-800">Atur Ulang Kata Sandi</h2>
                    <p class="mt-1 text-sm text-gray-600">
                        Masukkan alamat email Anda dan kata sandi baru di bawah ini.
                    </p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                            placeholder="Masukkan email terdaftar"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    
                    <div>
                        <x-input-label for="password" value="Kata Sandi Baru" class="font-semibold" />
                        <x-text-input 
                            id="password" 
                            class="mt-2 block w-full" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="new-password"
                            placeholder="Masukkan kata sandi baru"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi Baru" class="font-semibold" />
                        <x-text-input 
                            id="password_confirmation" 
                            class="mt-2 block w-full" 
                            type="password"
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            placeholder="Ulangi kata sandi baru"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex items-center">
                        <x-primary-button class="w-full justify-center bg-purple-600 py-3 text-sm hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-800">
                            Atur Ulang Kata Sandi
                        </x-primary-button>
                    </div>
                </form>
            </div>

            {{-- Tautan Kembali ke Login --}}
            <p class="mt-8 text-center text-sm text-gray-600">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 font-semibold text-purple-600 hover:text-purple-800 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Kembali ke Login
                </a>
            </p>

        </div>
    </div>
</x-guest-layout>