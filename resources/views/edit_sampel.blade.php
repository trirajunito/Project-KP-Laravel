<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Sampel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-4">Edit Data Sampel</h1>

    <form method="POST" action="{{ route('sampel.update', $sampel->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="nama_pelanggan"
            value="{{ $sampel->nama }}"
            class="border p-2 w-full mb-2"
            placeholder="Nama Pelanggan" required>

        <input type="text" name="no_telp"
            value="{{ $sampel->telp }}"
            class="border p-2 w-full mb-2"
            placeholder="No Telepon" required>

        <input type="text" name="personel"
            value="{{ $sampel->personel }}"
            class="border p-2 w-full mb-2"
            placeholder="Personel Penghubung">

        <input type="date" name="tanggal"
            value="{{ $sampel->tanggal }}"
            class="border p-2 w-full mb-2">

        <select name="jenis_sampel" class="border p-2 w-full mb-2">
            <option {{ $sampel->jenis == 'Air Limbah Domestik' ? 'selected' : '' }}>
                Air Limbah Domestik
            </option>
            <option {{ $sampel->jenis == 'Air Hygiene Sanitasi' ? 'selected' : '' }}>
                Air Hygiene Sanitasi
            </option>
        </select>

        <input type="number" name="jumlah"
            value="{{ $sampel->jumlah }}"
            class="border p-2 w-full mb-2"
            placeholder="Jumlah Sampel">

        <select name="keterangan" class="border p-2 w-full mb-2">
            <option {{ $sampel->keterangan == 'Sampel Datang' ? 'selected' : '' }}>
                Sampel Datang
            </option>
            <option {{ $sampel->keterangan == 'Sampling' ? 'selected' : '' }}>
                Sampling
            </option>
        </select>

        <textarea name="deskripsi"
            class="border p-2 w-full mb-2"
            placeholder="Deskripsi">{{ $sampel->deskripsi }}</textarea>

        <div class="flex justify-between mt-4">
            <a href="{{ route('data.sampel') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
               Kembali
            </a>

            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Update Data
            </button>
        </div>
    </form>

</div>

</body>
</html>