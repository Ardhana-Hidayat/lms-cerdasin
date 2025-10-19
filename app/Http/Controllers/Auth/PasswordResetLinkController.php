<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input dari form
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // 2. Cari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        // 3. Jika pengguna tidak ditemukan, kembali dengan pesan error
        if (!$user) {
            return back()->withErrors(['email' => 'Kami tidak dapat menemukan pengguna dengan alamat email tersebut.']);
        }

        // 4. Jika pengguna ditemukan, update passwordnya
        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        // 5. Arahkan kembali ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('status', 'Kata sandi Anda telah berhasil diubah!');
    }
}