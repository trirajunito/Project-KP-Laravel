<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Stok Bahan</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {

            background:
                linear-gradient(135deg,
                    #ECFDF5,
                    #DCFCE7);

            min-height: 100vh;

        }

        .card {

            background:
                rgba(255, 255, 255, .88);

            backdrop-filter:
                blur(10px);

            border-radius: 24px;

            padding: 24px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, .08);

        }

        .input {

            width: 100%;

            padding: 14px;

            border:
                2px solid #E5E7EB;

            border-radius: 14px;

            transition: .3s;

        }

        .input:focus {

            outline: none;

            border-color: #16A34A;

            box-shadow:
                0 0 15px rgba(22, 163, 74, .2);

        }

        .table-hover:hover {

            background: #ECFDF5;

        }

        .stat {

            position: relative;

            overflow: hidden;

        }

        .stat i {

            position: absolute;

            right: 20px;

            top: 18px;

            font-size: 45px;

            opacity: .15;

        }
    </style>

</head>

<body>

    <div class="max-w-7xl mx-auto p-7">

        <!-- HEADER -->

        <div
            class="
bg-gradient-to-r
from-green-700
to-emerald-600
rounded-3xl
p-7
text-white
shadow-xl
mb-6">

            <div
                class="
flex
justify-between
items-center">

                <div>

                    <h1
                        class="
text-4xl
font-bold">

                        <i
                            class="
fas fa-box-open
mr-2">

                        </i>

                        Stok Bahan

                    </h1>

                    <p
                        class="
opacity-90
mt-2">

                        Monitoring dan Pengelolaan Persediaan Bahan

                    </p>

                </div>

                <a

                    href="{{ route('dashboard') }}"

                    class="
bg-white/20
hover:bg-white/30
px-5
py-3
rounded-xl">

                    <i
                        class="
fas fa-arrow-left
mr-2">

                    </i>

                    Dashboard

                </a>

            </div>

        </div>

        <!-- CARD ATAS -->

        <div
            class="
grid
md:grid-cols-3
gap-5
mb-6">

            <div
                class="
card
stat">

                <i
                    class="
fas fa-boxes
text-green-700">

                </i>

                <p
                    class="
text-gray-500">

                    Total Bahan

                </p>

                <h2
                    class="
text-3xl
font-bold
text-green-700">

                    {{ count($data) }}

                </h2>

            </div>

            <div
                class="
card
stat">

                <i
                    class="
fas fa-warehouse
text-blue-600">

                </i>

                <p>

                    Monitoring

                </p>

                <h2
                    class="
font-bold
text-blue-700">

                    Aktif

                </h2>

            </div>

            <div
                class="
card
stat">

                <i
                    class="
fas fa-calendar
text-orange-500">

                </i>

                <p>

                    Hari Ini

                </p>

                <h2
                    class="
font-bold
text-orange-500">

                    {{ date('d M Y') }}

                </h2>

            </div>

        </div>

        <!-- NOTIF -->

        @if(session('success'))

        <div
            class="
bg-green-100
border
border-green-300
text-green-700
rounded-xl
p-4
mb-5">

            <i
                class="
fas fa-check-circle
mr-2">

            </i>

            {{ session('success') }}

        </div>

        @endif

        <!-- SEARCH -->

        <div
            class="
card
mb-6">

            <form
                method="GET">

                <div
                    class="
flex
gap-3">

                    <input

                        type="text"

                        name="search"

                        value="{{ request('search') }}"

                        placeholder="Cari nama / jenis bahan"

                        class="input">

                    <button

                        class="
bg-green-600
hover:bg-green-700
text-white
px-6
rounded-xl">

                        <i
                            class="
fas fa-search">

                        </i>

                    </button>

                </div>

            </form>

        </div>

        <!-- FORM -->

        <div
            class="
card
mb-6">

            <h2
                class="
font-bold
text-xl
text-green-700
mb-5">

                <i
                    class="
fas fa-plus-circle
mr-2">

                </i>

                Tambah Data Bahan

            </h2>

            <form
                method="POST"
                action="{{ route('stok.bahan.store') }}">

                @csrf

                <div
                    class="
grid
md:grid-cols-2
gap-4">

                    <input

                        type="text"

                        name="nama"

                        placeholder="Nama Bahan"

                        required

                        class="input">

                    <input

                        type="text"

                        name="jenis"

                        placeholder="Jenis Bahan"

                        required

                        class="input">

                    <input

                        type="date"

                        name="tanggal"

                        required

                        class="input">

                    <input

                        type="number"

                        name="jumlah"

                        placeholder="Jumlah"

                        required

                        class="input">

                </div>

                <button

                    class="
mt-5
bg-green-700
hover:bg-green-800
text-white
px-7
py-3
rounded-xl">

                    <i
                        class="
fas fa-save
mr-2">

                    </i>

                    Simpan Data

                </button>

            </form>

        </div>

        <!-- TABLE -->

        <div class="card">

            <h2
                class="
font-bold
text-xl
mb-5">

                <i
                    class="
fas fa-table
mr-2
text-green-700">

                </i>

                Data Bahan

            </h2>

            <div class="overflow-x-auto">

                <table
                    class="
w-full">

                    <thead>

                        <tr
                            class="
bg-green-700
text-white">

                            <th class="p-4">
                                No
                            </th>

                            <th>
                                Nama
                            </th>

                            <th>
                                Jenis
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Jumlah
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                        <tr
                            class="
border-b
text-center
table-hover">

                            <td
                                class="p-4">

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ $item->nama }}

                            </td>

                            <td>

                                {{ $item->jenis }}

                            </td>

                            <td>

                                {{ $item->tanggal }}

                            </td>

                            <td>

                                <span
                                    class="
bg-green-100
text-green-700
px-3
py-1
rounded-full">

                                    {{ $item->jumlah }}

                                </span>

                            </td>

                            <td>

                                <div
                                    class="
flex
justify-center
gap-2">

                                    <a

                                        href="{{ route('bahan.edit',$item->id) }}"

                                        class="
bg-yellow-400
hover:bg-yellow-500
text-white
px-3
py-2
rounded-lg">

                                        <i
                                            class="
fas fa-pen">

                                        </i>

                                    </a>

                                    <form

                                        action="{{ route('bahan.destroy',$item->id) }}"

                                        method="POST"

                                        onsubmit="return confirm('Hapus data?')">

                                        @csrf
                                        @method('DELETE')

                                        <button

                                            class="
bg-red-500
hover:bg-red-600
text-white
px-3
py-2
rounded-lg">

                                            <i
                                                class="
fas fa-trash">

                                            </i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="6"

                                class="
text-center
p-6
text-gray-500">

                                <i
                                    class="
fas fa-box-open
text-3xl
mb-2">

                                </i>

                                <br>

                                Belum ada data

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