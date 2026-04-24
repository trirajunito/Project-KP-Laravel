<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alat;

class AlatController extends Controller
{
    public function index(Request $request)
    {
        $query = Alat::query();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('jenis', 'like', '%' . $request->search . '%');
        }

        $data = $query->orderBy('id', 'desc')->get();

        return view('stok_alat', compact('data'));
    }

    public function store(Request $request)
    {
        Alat::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
        ]);

        return back()->with('success', 'Data alat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $alat = Alat::findOrFail($id);
        return view('edit_alat', compact('alat'));
    }

    public function update(Request $request, $id)
    {
        $alat = Alat::findOrFail($id);

        $alat->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('stok.alat')
            ->with('success', 'Data alat berhasil diupdate');
    }

    public function destroy($id)
    {
        $alat = Alat::findOrFail($id);
        $alat->delete();

        return back()->with('success', 'Data alat berhasil dihapus');
    }
}