<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Stok Alat</title>

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
                blur(12px);

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

            right: 18px;

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
text-white
p-7
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
fas fa-tools
mr-2">

                        </i>

                        Stok Alat

                    </h1>

                    <p
                        class="
opacity-90
mt-2">

                        Monitoring dan Pengelolaan Alat Laboratorium

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

        <!-- STATISTIK -->

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
fas fa-toolbox
text-green-700">

                </i>

                <p
                    class="
text-gray-500">

                    Total Alat

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
fas fa-screwdriver-wrench
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
fas fa-circle-check
mr-2">

            </i>

            {{ session('success') }}

        </div>

        @endif

        <div
            class="
grid
lg:grid-cols-3
gap-6">

            <!-- FORM -->

            <div class="card">

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

                    Tambah Alat

                </h2>

                <form
                    method="POST"
                    action="{{ route('stok.alat.store') }}">

                    @csrf

                    <div
                        class="
space-y-4">

                        <input

                            type="text"

                            name="nama"

                            placeholder="Nama Alat"

                            required

                            class="input">

                        <input

                            type="text"

                            name="jenis"

                            placeholder="Jenis Alat"

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

                        <button

                            class="
w-full
bg-green-700
hover:bg-green-800
text-white
py-3
rounded-xl">

                            <i
                                class="
fas fa-save
mr-2">

                            </i>

                            Simpan Data

                        </button>

                    </div>

                </form>

            </div>

            <!-- TABLE -->

            <div
                class="
lg:col-span-2">

                <div class="card">

                    <div
                        class="
flex
justify-between
items-center
mb-5">

                        <h2
                            class="
font-bold
text-xl">

                            <i
                                class="
fas fa-table
mr-2
text-green-700">

                            </i>

                            Daftar Alat

                        </h2>

                        <form method="GET">

                            <input

                                type="text"

                                name="search"

                                value="{{ request('search') }}"

                                placeholder="Cari alat..."

                                class="input">

                        </form>

                    </div>

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
table-hover">

                                    <td
                                        class="p-4">

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
gap-2">

                                            <a

                                                href="{{ route('alat.edit',$item->id) }}"

                                                class="
bg-yellow-500
hover:bg-yellow-600
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

                                                action="{{ route('alat.destroy',$item->id) }}"

                                                method="POST"

                                                onsubmit="return confirm('Hapus data ini?')">

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
                                        colspan="5"

                                        class="
text-center
p-8
text-gray-500">

                                        <i
                                            class="
fas fa-toolbox
text-4xl
mb-2">

                                        </i>

                                        <br>

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