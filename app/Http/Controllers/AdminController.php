<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            // Cek role pengguna
            if (Auth::user()->role === 'admin') {
                return view('adminpanel'); // Tampilkan view untuk admin
            } else {
                return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
            }
        }
    
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }
}    