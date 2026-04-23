<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <div class="w-64 bg-green-700 text-white p-5 flex flex-col">

        <div class="text-center mb-8">
            <img src="https://via.placeholder.com/80" class="rounded-full mx-auto mb-2">
            <h2 class="font-bold">{{ Auth::user()->nama }}</h2>
            <p class="text-sm">{{ Auth::user()->jabatan }}</p>
        </div>

        <nav class="space-y-2 flex-1">
            <a href="{{ route('data.sampel') }}" class="block p-2 rounded hover:bg-green-600">Data Sampel</a>
            <a href="{{ route('stok.bahan') }}" class="block p-2 rounded hover:bg-green-600">Stok Bahan</a>
            <a href="{{ route('stok.alat') }}" class="block p-2 rounded hover:bg-green-600">Stok Alat</a>
        </nav>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full bg-red-500 p-2 rounded mt-4 hover:bg-red-600">
                Keluar
            </button>
        </form>
    </div>


    <!-- CONTENT -->
    <div class="flex-1 p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Dashboard</h1>

            <form method="GET">
                <select name="tahun" onchange="this.form.submit()" class="border p-2 rounded">
                    @for($i = date('Y'); $i >= 2020; $i--)
                        <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </form>
        </div>


        <!-- GRAFIK -->
        <div class="bg-white p-5 rounded shadow mb-6">
            <h2 class="font-semibold mb-4">Grafik Jumlah Sampel</h2>

            <div class="w-full md:w-3/4 mx-auto">
                <canvas 
                    id="chartSampel"
                    height="120"
                    data-datang='@json($datang)'
                    data-sampling='@json($sampling)'
                ></canvas>
            </div>
        </div>


        <!-- CARD -->
        <div class="grid grid-cols-2 gap-4">

            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-gray-500">Sampel Datang</h3>
                <p class="text-2xl font-bold">
                    {{ array_sum($datang) }}
                </p>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-gray-500">Sampling</h3>
                <p class="text-2xl font-bold">
                    {{ array_sum($sampling) }}
                </p>
            </div>

        </div>

    </div>

</div>


<script>
const canvas = document.getElementById('chartSampel');

const datang = JSON.parse(canvas.dataset.datang || '[]');
const sampling = JSON.parse(canvas.dataset.sampling || '[]');

new Chart(canvas, {
    type: 'bar',
    data: {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
        datasets: [
            {
                label: 'Sampel Datang',
                data: datang.length ? datang : [0,0,0,0,0,0,0,0,0,0,0,0],
                backgroundColor: 'green'
            },
            {
                label: 'Sampling',
                data: sampling.length ? sampling : [0,0,0,0,0,0,0,0,0,0,0,0],
                backgroundColor: 'blue'
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>

</body>
</html>