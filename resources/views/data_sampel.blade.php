<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width,initial-scale=1">

    <title>Data Sampel</title>

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

            border-radius: 22px;

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

            border-color:

                #16A34A;

            box-shadow:

                0 0 15px rgba(22, 163, 74, .2);

        }

        .table-hover:hover {

            background:

                #ECFDF5;

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
fas fa-flask
mr-2">

                        </i>

                        Data Sampel

                    </h1>

                    <p
                        class="
opacity-90
mt-2">

                        Monitoring dan Pengolahan Data Sampel UPT Lingkungan Hidup

                    </p>

                </div>

                <a

                    href="{{ route('dashboard') }}"

                    class="
bg-white/20
px-5
py-3
rounded-xl
hover:bg-white/30">

                    <i
                        class="
fas fa-arrow-left">

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
fas fa-database
text-green-700">

                </i>

                <p
                    class="
text-gray-500">

                    Total Sampel

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
fas fa-vial
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

                    Tanggal Hari Ini

                </p>

                <h2
                    class="
font-bold
text-orange-500">

                    {{ date('d M Y') }}

                </h2>

            </div>

        </div>

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

                        placeholder="Cari nama pelanggan..."

                        class="input">

                    <button

                        class="
bg-green-600
text-white
px-6
rounded-xl
hover:bg-green-700">

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
text-green-700
text-xl
mb-5">

                <i
                    class="
fas fa-plus-circle
mr-2">

                </i>

                Tambah Data Sampel

            </h2>

            <form
                method="POST"
                action="{{ route('data.sampel.store') }}">

                @csrf

                <div
                    class="
grid
md:grid-cols-2
gap-4">

                    <input
                        name="nama_pelanggan"
                        placeholder="Nama Pelanggan"
                        class="input">

                    <input
                        name="no_telp"
                        placeholder="Nomor Telepon"
                        class="input">

                    <input
                        name="personel"
                        placeholder="Personel"
                        class="input">

                    <input
                        type="date"
                        name="tanggal"
                        class="input">

                    <select
                        name="jenis_sampel"
                        class="input">

                        <option>
                            Air Limbah Domestik
                        </option>

                        <option>
                            Air Hygiene Sanitasi
                        </option>

                    </select>

                    <input
                        type="number"
                        name="jumlah"
                        placeholder="Jumlah Sampel"
                        class="input">

                </div>

                <select
                    name="keterangan"

                    class="
input
mt-4">

                    <option>
                        Sampel Datang
                    </option>

                    <option>
                        Sampling
                    </option>

                </select>

                <textarea

                    name="deskripsi"

                    placeholder="Deskripsi"

                    rows="4"

                    class="
input
mt-4">

</textarea>

                <button

                    class="
mt-5
bg-green-700
text-white
px-7
py-3
rounded-xl
hover:bg-green-800">

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

                Daftar Sampel

            </h2>

            <div class="overflow-auto">

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
                                Telp
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Jenis
                            </th>

                            <th>
                                Jumlah
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($data as $d)

                        <tr
                            class="
border-b
text-center
table-hover">

                            <td
                                class="p-4">

                                {{ $d->nama }}

                            </td>

                            <td>

                                {{ $d->telp }}

                            </td>

                            <td>

                                {{ $d->tanggal }}

                            </td>

                            <td>

                                {{ $d->jenis }}

                            </td>

                            <td>

                                {{ $d->jumlah }}

                            </td>

                            <td>

                                {{ $d->keterangan }}

                            </td>

                            <td>

                                <div
                                    class="
flex
justify-center
gap-2">

                                    <a

                                        href="{{ route('sampel.edit',$d->id) }}"

                                        class="
bg-yellow-400
px-3
py-2
rounded-lg
text-white">

                                        <i
                                            class="
fas fa-pen">

                                        </i>

                                    </a>

                                    <form

                                        action="{{ route('sampel.destroy',$d->id) }}"

                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button

                                            class="
bg-red-500
px-3
py-2
rounded-lg
text-white">

                                            <i
                                                class="
fas fa-trash">

                                            </i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>