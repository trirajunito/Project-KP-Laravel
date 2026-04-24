<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;

class BahanController extends Controller
{
    public function index(Request $request)
    {
        $query = Bahan::query();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('jenis', 'like', '%' . $request->search . '%');
        }

        $data = $query->orderBy('id', 'desc')->get();

        return view('stok_bahan', compact('data'));
    }

    public function store(Request $request)
    {
        Bahan::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
        ]);

        return back()->with('success', 'Data bahan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $bahan = Bahan::findOrFail($id);
        return view('edit_bahan', compact('bahan'));
    }

    public function update(Request $request, $id)
    {
        $bahan = Bahan::findOrFail($id);

        $bahan->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('stok.bahan')
            ->with('success', 'Data bahan berhasil diupdate');
    }
}