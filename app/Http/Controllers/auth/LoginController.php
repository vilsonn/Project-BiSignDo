<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Memproses login (admin dan user biasa).
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // 1) Cek apakah user adalah admin (email = admin@bisigndo.com, pass = @Admin123)
        if ($request->email === 'admin@bisigndo.com' && $request->password === '@Admin123') {
            // Tandai di session bahwa user ini admin
            $request->session()->put('is_admin', true);

            // Redirect ke admin dashboard
            return redirect()->route('admin.dashboard');
        }

        // 2) Jika bukan admin, login normal via Auth::attempt
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            // Regenerasi session
            $request->session()->regenerate();

            // Arahkan ke dashboard user biasa
            return redirect()->route('dashboard');
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password Anda salah.',
        ])->onlyInput('email');
    }

    /**
     * Logout user (admin maupun user biasa).
     */
    public function logout(Request $request)
    {
        // Hapus session admin jika ada
        $request->session()->forget('is_admin');

        // Logout user biasa
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan ke halaman landing (atau login)
        return redirect('/');
    }
}