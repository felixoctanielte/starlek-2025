<?php

namespace App\Http\Controllers;

use App\Models\Isthara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IstharaController extends Controller
{
    // ========== ADMIN ==========
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                $istharas = Isthara::all(); // Ambil semua data kandidat
                return view('admin.isthara.index', compact('istharas'));
            } else {
                return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
            }
        }

        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    public function create()
    {
        return view('admin.isthara.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('istharas', 'public');
        }

        Isthara::create($data);
        return redirect()->route('admin.isthara.index')->with('success', 'Kandidat berhasil ditambahkan');
    }

    public function edit(Isthara $isthara)
    {
        return view('admin.isthara.edit', compact('isthara'));
    }

    public function update(Request $request, Isthara $isthara)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('istharas', 'public');
        }

        $isthara->update($data);
        return redirect()->route('admin.isthara.index')->with('success', 'Kandidat berhasil diperbarui');
    }

    public function destroy(Isthara $isthara)
    {
        $isthara->delete();
        return redirect()->route('admin.isthara.index')->with('success', 'Kandidat berhasil dihapus');
    }
}