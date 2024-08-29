<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Pastikan pengguna sudah login
        if (Auth::check()) {
            // Ambil tipe pengguna yang sedang login
            $user_type = Auth::user()->usertype;

            // Arahkan berdasarkan tipe pengguna
            if ($user_type == 'admin') {
                return view('admin.index');
            } else if ($user_type == 'user') {
                return view('home.index');
            }
        } else {
            // Jika tidak ada pengguna yang login, arahkan ke halaman login atau berikan pesan error
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }
    }
}
