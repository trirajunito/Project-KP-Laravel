<!DOCTYPE html>
<html>
<head>
    <title>Data Sampel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Data Sampel</h1>

    <a href="{{ route('dashboard') }}"
       class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
       Kembali
    </a>
</div>

<!-- NOTIF -->
@if(session('success'))
<div class="bg-green-200 p-3 mb-4 rounded">
    {{ session('success') }}
</div>
@endif

<!-- SEARCH -->
<form method="GET" class="mb-4">
    <input type="text" name="search" placeholder="Cari..."
        class="border p-2 rounded w-1/3">
    <button class="bg-green-600 text-white px-4 py-2 rounded">Cari</button>
</form>

<!-- FORM -->
<form method="POST" action="{{ route('data.sampel.store') }}" class="bg-white p-4 rounded shadow mb-6">
@csrf

<input name="nama_pelanggan" placeholder="Nama Pelanggan" class="border p-2 w-full mb-2" required>
<input name="no_telp" placeholder="No Telepon" class="border p-2 w-full mb-2" required>
<input name="personel" placeholder="Personel Penghubung" class="border p-2 w-full mb-2">

<input type="date" name="tanggal" class="border p-2 w-full mb-2">

<select name="jenis_sampel" class="border p-2 w-full mb-2">
    <option>Air Limbah Domestik</option>
    <option>Air Hygiene Sanitasi</option>
</select>

<input type="number" name="jumlah" placeholder="Jumlah Sampel" class="border p-2 w-full mb-2">

<select name="keterangan" class="border p-2 w-full mb-2">
    <option>Sampel Datang</option>
    <option>Sampling</option>
</select>

<textarea name="deskripsi" placeholder="Deskripsi" class="border p-2 w-full mb-2"></textarea>

<button class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Data</button>

</form>

<!-- TABLE -->
<table class="w-full bg-white shadow rounded">
<thead class="bg-green-600 text-white">
<tr>
    <th class="p-2">Nama</th>
    <th>No Telp</th>
    <th>Personel</th>
    <th>Tanggal</th>
    <th>Jenis</th>
    <th>Jumlah</th>
    <th>Keterangan</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
@foreach($data as $d)
<tr class="text-center border-b">
    <td>{{ $d->nama }}</td>
    <td>{{ $d->telp }}</td>
    <td>{{ $d->personel }}</td>
    <td>{{ $d->tanggal }}</td>
    <td>{{ $d->jenis }}</td>
    <td>{{ $d->jumlah }}</td>
    <td>{{ $d->keterangan }}</td>

    <td class="p-2 space-x-2">
        <!-- EDIT -->
        <a href="{{ route('sampel.edit', $d->id) }}"
           class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
           Edit
        </a>

        <!-- DELETE -->
        <form action="{{ route('sampel.destroy', $d->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                onclick="return confirm('Yakin mau hapus data ini?')">
                Hapus
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>

</table>

</body>
</html>