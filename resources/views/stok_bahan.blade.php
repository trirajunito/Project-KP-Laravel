<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Bahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-green-50 to-gray-100 min-h-screen p-6">

<div class="max-w-7xl mx-auto">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-green-700">Stok Bahan</h1>
            <p class="text-gray-500">Kelola persediaan bahan perusahaan</p>
        </div>

        <a href="{{ route('dashboard') }}"
           class="bg-gray-700 text-white px-5 py-2 rounded-lg hover:bg-gray-800">
            Kembali
        </a>
    </div>

    <!-- NOTIF -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-5">
        {{ session('success') }}
    </div>
    @endif

    <!-- SEARCH -->
    <form method="GET" class="bg-white p-4 rounded-xl shadow mb-6 flex gap-3">
        <input type="text"
               name="search"
               placeholder="Cari nama / jenis bahan..."
               value="{{ request('search') }}"
               class="border w-full p-3 rounded-lg">

        <button class="bg-green-600 text-white px-6 rounded-lg hover:bg-green-700">
            Cari
        </button>
    </form>

    <!-- FORM INPUT -->
    <div class="bg-white p-6 rounded-xl shadow mb-8">
        <h2 class="text-xl font-bold mb-4 text-gray-700">Tambah Bahan</h2>

        <form method="POST" action="{{ route('stok.bahan.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <input type="text"
                       name="nama"
                       placeholder="Nama Bahan"
                       required
                       class="border p-3 rounded-lg">

                <input type="text"
                       name="jenis"
                       placeholder="Jenis Bahan"
                       required
                       class="border p-3 rounded-lg">

                <input type="date"
                       name="tanggal"
                       required
                       class="border p-3 rounded-lg">

                <input type="number"
                       name="jumlah"
                       placeholder="Jumlah"
                       required
                       class="border p-3 rounded-lg">

            </div>

            <button class="mt-5 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Simpan Data
            </button>

        </form>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="p-4 border-b">
            <h2 class="text-xl font-bold text-gray-700">Data Bahan</h2>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left">

                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="p-3">No</th>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Jenis</th>
                        <th class="p-3">Tanggal</th>
                        <th class="p-3">Jumlah</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($data as $item)
                <tr class="border-b hover:bg-gray-50">

                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $item->nama }}</td>
                    <td class="p-3">{{ $item->jenis }}</td>
                    <td class="p-3">{{ $item->tanggal }}</td>
                    <td class="p-3">{{ $item->jumlah }}</td>

                    <td class="p-3 text-center">
                        <div class="flex justify-center gap-2">

                            <a href="{{ route('bahan.edit', $item->id) }}"
                               class="bg-yellow-500 text-white px-4 py-1 rounded hover:bg-yellow-600">
                                Edit
                            </a>

                            <form action="{{ route('bahan.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-5 text-center text-gray-500">
                        Data belum ada
                    </td>
                </tr>
                @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>