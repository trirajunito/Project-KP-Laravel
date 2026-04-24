<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Alat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-100 via-white to-blue-100 min-h-screen">

<div class="max-w-7xl mx-auto p-6">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Stok Alat</h1>
            <p class="text-slate-500">Kelola data alat laboratorium dan operasional</p>
        </div>

        <a href="{{ route('dashboard') }}"
           class="bg-slate-700 text-white px-5 py-2 rounded-xl hover:bg-slate-800 transition">
            Kembali
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-5">
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg p-6">

                <h2 class="text-xl font-semibold text-slate-800 mb-4">Tambah Stok Alat</h2>

                <form method="POST" action="{{ route('stok.alat.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="text-sm text-slate-600">Nama Alat</label>
                        <input type="text" name="nama" required
                            class="w-full border rounded-xl px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div>
                        <label class="text-sm text-slate-600">Jenis Alat</label>
                        <input type="text" name="jenis" required
                            class="w-full border rounded-xl px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div>
                        <label class="text-sm text-slate-600">Tanggal</label>
                        <input type="date" name="tanggal" required
                            class="w-full border rounded-xl px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div>
                        <label class="text-sm text-slate-600">Jumlah</label>
                        <input type="number" name="jumlah" required
                            class="w-full border rounded-xl px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700 transition font-semibold">
                        Simpan Data
                    </button>
                </form>

            </div>
        </div>

        <div class="lg:col-span-2">

            <div class="bg-white rounded-2xl shadow-lg p-6">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-5">
                    <h2 class="text-xl font-semibold text-slate-800">Daftar Stok Alat</h2>

                    <form method="GET">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari alat..."
                            class="border rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-100 text-slate-700">
                                <th class="p-3 text-left">Nama</th>
                                <th class="p-3 text-left">Jenis</th>
                                <th class="p-3 text-left">Tanggal</th>
                                <th class="p-3 text-left">Jumlah</th>
                                <th class="p-3 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse($data as $item)
                            <tr class="border-b hover:bg-slate-50">
                                <td class="p-3">{{ $item->nama }}</td>
                                <td class="p-3">{{ $item->jenis }}</td>
                                <td class="p-3">{{ $item->tanggal }}</td>
                                <td class="p-3">{{ $item->jumlah }}</td>

                                <td class="p-3">
                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('alat.edit', $item->id) }}"
                                           class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600">
                                            Edit
                                        </a>

                                        <form action="{{ route('alat.destroy', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Hapus data ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-6 text-slate-500">
                                    Belum ada data alat
                                </td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>