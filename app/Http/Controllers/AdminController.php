<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Cek apakah session is_admin ada
        if (!$request->session()->has('is_admin')) {
            // Jika bukan admin, arahkan ke dashboard user biasa
            return redirect()->route('dashboard');
        }

        // Kalau admin, tampilkan view admin dashboard
        return view('admin.dashboard');
    }
}