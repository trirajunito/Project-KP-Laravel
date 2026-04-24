<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-8">

<div class="max-w-2xl mx-auto bg-white rounded-xl shadow p-8">

    <h1 class="text-3xl font-bold text-green-700 mb-6">
        Edit Data Bahan
    </h1>

    <form method="POST" action="{{ route('bahan.update', $bahan->id) }}">
        @csrf
        @method('PUT')

        <div class="space-y-4">

            <input type="text"
                   name="nama"
                   value="{{ $bahan->nama }}"
                   class="w-full border p-3 rounded-lg"
                   placeholder="Nama Bahan"
                   required>

            <input type="text"
                   name="jenis"
                   value="{{ $bahan->jenis }}"
                   class="w-full border p-3 rounded-lg"
                   placeholder="Jenis Bahan"
                   required>

            <input type="date"
                   name="tanggal"
                   value="{{ $bahan->tanggal }}"
                   class="w-full border p-3 rounded-lg"
                   required>

            <input type="number"
                   name="jumlah"
                   value="{{ $bahan->jumlah }}"
                   class="w-full border p-3 rounded-lg"
                   placeholder="Jumlah"
                   required>

        </div>

        <div class="flex gap-3 mt-6">

            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Update
            </button>

            <a href="{{ route('stok.bahan') }}"
               class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                Kembali
            </a>

        </div>

    </form>

</div>

</body>
</html>