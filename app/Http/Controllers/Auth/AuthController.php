<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba otentikasi menggunakan kredensial
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerasi session untuk keamanan

        // Jika gagal, kirimkan kembali kesalahan dengan error message
        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
        }       
    }
}