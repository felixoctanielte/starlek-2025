<?php

namespace App\Http\Controllers;

use App\Models\Isthara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VotingController extends Controller
{

    public function index()
    {
        $startTime = Carbon::parse('2025-05-29 21:05:00'); // Atur waktu mulai voting
        $istharas = Isthara::all(); // Ambil semua kandidat

        if (Carbon::now()->lt($startTime)) {
            // Jika belum waktunya voting, tampilkan halaman countdown
            return view('voting.countdown', ['startTime' => $startTime]);
        }

        // Jika sudah waktunya voting, tampilkan halaman voting
        return view('voting.index', compact('istharas'));
    }


    public function vote(Request $request, $id)
    {
        $isthara = Isthara::findOrFail($id);
        $isthara->increment('vote_count');

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Vote berhasil'], 200)
                ->cookie('has_voted', true, 60 * 24 * 30); // 30 hari
        }

        return redirect()->route('voting.results')
            ->withCookie(cookie('has_voted', true, 60 * 24 * 30))
            ->with('success', 'Terima kasih, vote kamu telah dicatat!');
    }

    public function results()
    {
        $istharas = Isthara::all();
        return view('voting.results', compact('istharas'));
    }
}
