<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard.index');
        }

        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('remember');

        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => true
        ], $remember)) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('auth.login')
                ->with('error', 'Pastikan email dan password yang Anda masukkan benar.');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login');
    }

    public function forgot_password()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard.index');
        }

        return view('backend.auth.forgot-password');
    }

    public function send_reset_link(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Reset Password Berhasil. Periksa email Anda.');
        } else {
            return back()->with('error', 'Reset Password Gagal. Pastikan email terdaftar.');
        }
    }

    public function password_reset($token, Request $request)
    {
        if (auth()->check()) {
            return redirect()->route('dashboard.index');
        }

        $email = $request->email;

        return view('backend.auth.reset-password', ['token' => $token, 'email' => $email]);
    }

    public function update_password(Request $request)
    {
        $messages = [];

        if (strlen($request->password) < 8) {
            $messages[] = 'Password minimal 8 karakter.';
        }

        if ($request->password !== $request->password_confirmation) {
            $messages[] = 'Konfirmasi password tidak sesuai.';
        }

        if (count($messages) > 0) {
            return back()->with('error', ['message' => implode(' ', $messages)]);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('auth.login')->with('success', 'Reset Password Berhasil. Silakan masuk dengan password baru Anda.')
            : back()->with('error', ['message' => 'Reset Password Gagal. Pastikan tidak ada kesalahan.']);
    }
}
