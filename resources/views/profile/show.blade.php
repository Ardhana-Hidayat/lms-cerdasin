@extends(Auth::user()->role == 'teacher' ? 'layouts.teacher' : 'layouts.student')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-purple-700">Detail Profil</h1>
        </div>

        <div class="bg-white p-6 rounded-lg border">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            Informasi Akun
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Berikut adalah informasi detail akun Anda yang terdaftar di sistem.
                        </p>
                    </header>

                    <div class="mt-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Nama Lengkap</label>
                            <p class="mt-1 text-gray-900 font-semibold">{{ $user->name }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Email</label>
                            <p class="mt-1 text-gray-900 font-semibold">{{ $user->email }}</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        {{-- Menampilkan data dari tabel teachers jika ada --}}
        @if ($teacher)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Informasi Guru
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                Informasi tambahan terkait data Anda sebagai pengajar.
                            </p>
                        </header>

                        <div class="mt-6 space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">NIK</label>
                                <p class="mt-1 text-gray-900 font-semibold">{{ $teacher->nik ?? '-' }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500">Nomor Telepon</label>
                                <p class="mt-1 text-gray-900 font-semibold">{{ $teacher->phone ?? '-' }}</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        @endif

        <div class="flex items-center gap-4 mt-6">
            <a href="{{ route('profile.edit') }}">
                <button class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Edit Profil
                </button>
            </a>
        </div>
    </div>
@endsection