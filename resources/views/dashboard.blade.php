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

    <!-- ================= SIDEBAR ================= -->
    <div class="w-64 bg-green-700 text-white p-5 flex flex-col">

        <!-- PROFIL -->
        <div class="text-center mb-8">
            <img src="https://via.placeholder.com/80" class="rounded-full mx-auto mb-2">
            <h2 class="font-bold">{{ Auth::user()->nama }}</h2>
            <p class="text-sm">
                {{ Auth::user()->jabatan }}
            </p>
        </div>

        <!-- MENU -->
        <nav class="space-y-2 flex-1">
            <a href="{{ route('data.sampel') }}" 
               class="block p-2 rounded hover:bg-green-600">Data Sampel</a>

            <a href="{{ route('stok.bahan') }}" 
               class="block p-2 rounded hover:bg-green-600">Stok Bahan</a>

            <a href="{{ route('stok.alat') }}" 
               class="block p-2 rounded hover:bg-green-600">Stok Alat</a>
        </nav>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full bg-red-500 p-2 rounded mt-4 hover:bg-red-600">
                Keluar
            </button>
        </form>

    </div>


    <!-- ================= CONTENT ================= -->
    <div class="flex-1 p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Dashboard</h1>

            <!-- PILIH TAHUN -->
            <select id="tahun" class="border p-2 rounded">
                <option>2026</option>
                <option>2025</option>
                <option>2024</option>
            </select>
        </div>


        <!-- GRAFIK -->
        <div class="bg-white p-5 rounded shadow mb-6">
            <h2 class="font-semibold mb-4">Grafik Jumlah Sampel</h2>
            <canvas id="chartSampel"></canvas>
        </div>


        <!-- CARD INFO -->
        <div class="grid grid-cols-2 gap-4">

            <!-- Sampel Datang -->
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-gray-500">Sampel Datang</h3>
                <p class="text-2xl font-bold" id="datang">0</p>
            </div>

            <!-- Sampling -->
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-gray-500">Sampling</h3>
                <p class="text-2xl font-bold" id="sampling">0</p>
            </div>

        </div>

    </div>

</div>


<!-- ================= CHART JS ================= -->
<script>

let dataChart = [10,20,15,30,25,40,35,50,45,60,55,70]; // dummy dulu

const ctx = document.getElementById('chartSampel');

const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
        datasets: [{
            label: 'Jumlah Sampel',
            data: dataChart,
            borderWidth: 2,
            tension: 0.4
        }]
    }
});


// ================= DATA CARD =================
function updateCard(){
    let totalDatang = 120;
    let totalSampling = 80;

    document.getElementById('datang').innerText = totalDatang;
    document.getElementById('sampling').innerText = totalSampling;
}

updateCard();


// ================= FILTER TAHUN =================
document.getElementById('tahun').addEventListener('change', function(){
    let tahun = this.value;

    // nanti di sini ambil data dari database (AJAX)
    console.log("Tahun dipilih:", tahun);
});

</script>

</body>
</html>