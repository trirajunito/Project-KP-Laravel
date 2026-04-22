<?php

namespace App\Http\Controllers;

use App\Models\DataSampel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataSampelController extends Controller
{
    public function index(Request $request)
    {
        $query = DataSampel::query();

        // SEARCH
        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('personel', 'like', '%' . $request->search . '%');
        }

        $data = $query->orderBy('tanggal', 'desc')->get();

        return view('data_sampel', compact('data'));
    }

    public function store(Request $request)
    {
        DataSampel::create([
            'nama' => $request->nama_pelanggan,
            'telp' => $request->no_telp,
            'personel' => $request->personel,
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis_sampel,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('success', 'Data berhasil ditambahkan');
    }

    public function dashboard(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');

        $result = DB::table('data_sampel')
            ->select(
                DB::raw('MONTH(tanggal) as bulan'),
                DB::raw("SUM(CASE WHEN keterangan = 'Sampel Datang' THEN jumlah ELSE 0 END) as datang"),
                DB::raw("SUM(CASE WHEN keterangan = 'Sampling' THEN jumlah ELSE 0 END) as sampling")
            )
            ->whereYear('tanggal', $tahun)
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->get();

        // default 0 untuk 12 bulan
        $datang = array_fill(1, 12, 0);
        $sampling = array_fill(1, 12, 0);

        foreach ($result as $r) {
            $datang[$r->bulan] = $r->datang;
            $sampling[$r->bulan] = $r->sampling;
        }

        return view('dashboard', [
            'datang' => array_values($datang),
            'sampling' => array_values($sampling),
            'tahun' => $tahun
        ]);
    }
}