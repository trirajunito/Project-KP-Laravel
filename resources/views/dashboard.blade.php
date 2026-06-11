<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Dashboard Monitoring</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {

            background:
                linear-gradient(135deg,
                    #ECFDF5,
                    #F0FDF4);

            overflow-x: hidden;

        }

        /* PARTICLE */

        #particles-js {

            position: fixed;

            top: 0;

            left: 0;

            width: 100%;

            height: 100%;

            z-index: -3;

        }

        /* GLOW */

        .glow {

            position: fixed;

            width: 350px;

            height: 350px;

            border-radius: 50%;

            filter: blur(120px);

            opacity: .16;

            z-index: -2;

            animation:
                moveGlow 12s infinite alternate;

        }

        .glow1 {

            background: #22C55E;

            top: -100px;

            left: -100px;

        }

        .glow2 {

            background: #0EA5E9;

            bottom: -100px;

            right: -100px;

        }

        @keyframes moveGlow {

            0% {

                transform:
                    translate(0, 0);

            }

            100% {

                transform:
                    translate(50px, 40px);

            }

        }

        .sidebar {

            width: 260px;

            background:
                linear-gradient(180deg,
                    #166534,
                    #15803D);

            height: 100vh;

            position: fixed;

            left: 0;

            top: 0;

            padding: 25px;

            box-shadow:
                5px 0 20px rgba(0, 0, 0, .1);

            color: white;

            display: flex;

            flex-direction: column;

            backdrop-filter:
                blur(10px);

        }

        .menu a {

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 14px;

            border-radius: 12px;

            transition: .3s;

            margin-bottom: 8px;

        }

        .menu a:hover {

            background:
                rgba(255, 255, 255, .15);

            transform:
                translateX(6px);

        }

        .card {

            background:
                rgba(255, 255, 255, .92);

            backdrop-filter:
                blur(10px);

            border-radius: 20px;

            padding: 24px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, .08);

            transition: .3s;

        }

        .card:hover {

            transform:
                translateY(-5px);

        }

        .stat {

            position: relative;

            overflow: hidden;

        }

        .stat-icon {

            font-size: 45px;

            opacity: .18;

            position: absolute;

            right: 20px;

            top: 18px;

        }

        .content {

            margin-left: 260px;

            padding: 30px;

        }
    </style>

</head>

<body>

    <div id="particles-js"></div>

    <div class="glow glow1"></div>

    <div class="glow glow2"></div>

    <div class="sidebar">

        <div>

            <div class="text-center mb-8">

                <div

                    class="
                        w-20
                        h-20
                        bg-white/20
                        rounded-full
                        mx-auto
                        flex
                        items-center
                        justify-center
                        text-3xl
                        mb-3">

                    <i class="fas fa-user"></i>

                </div>

                <h2 class="font-bold">

                    {{ Auth::user()->nama }}

                </h2>

                <p class="text-sm">

                    {{ Auth::user()->jabatan }}

                </p>

            </div>

            <div class="menu">

                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-chart-line"></i>
                    Dashboard
                </a>

                <a href="{{ route('data.sampel') }}">
                    <i class="fas fa-flask"></i>
                    Data Sampel
                </a>

                <a href="{{ route('stok.bahan') }}">
                    <i class="fas fa-box"></i>
                    Stok Bahan
                </a>

                <a href="{{ route('stok.alat') }}">
                    <i class="fas fa-tools"></i>
                    Stok Alat
                </a>

            </div>

        </div>

        <form
            method="POST"
            action="{{ route('logout') }}">

            @csrf

            <button

                class="
                w-full
                bg-red-500
                hover:bg-red-600
                p-3
                rounded-xl">

                Keluar

            </button>

        </form>

    </div>

    <div class="content">

        <div class="flex justify-between mb-6">

            <div>

                <h1
                    class="
                    text-4xl
                    font-bold
                    text-green-800">

                    Dashboard Monitoring

                </h1>

                <p class="text-gray-500">

                    UPT Lingkungan Hidup

                </p>

            </div>

            <form method="GET">

                <select

                    name="tahun"

                    onchange="this.form.submit()"

                    class="
                    border
                    rounded-xl
                    px-4
                    py-2">

                    @for($i=date('Y');$i>=2020;$i--)

                    <option
                        value="{{ $i }}"
                        {{ $tahun==$i?'selected':'' }}>

                        {{ $i }}

                    </option>

                    @endfor

                </select>

            </form>

        </div>

        <div
            class="
            card
            mb-6
            bg-gradient-to-r
            from-green-700
            to-emerald-600
            text-white">

            <h2
                class="
                text-2xl
                font-bold">

                Selamat Datang

                {{ Auth::user()->nama }}

                👋

            </h2>

            <p>

                Monitoring Pengolahan Data UPT Lingkungan Hidup

            </p>

        </div>

        <div
            class="
            grid
            md:grid-cols-4
            gap-5
            mb-6">

            <div class="card stat">

                <i
                    class="
                    fas fa-vial
                    stat-icon
                    text-green-700">

                </i>

                <p>Sampel Datang</p>

                <h2
                    class="
                    text-3xl
                    font-bold
                    text-green-700">

                    {{ array_sum($datang) }}

                </h2>

            </div>

            <div class="card stat">

                <i
                    class="
                    fas fa-chart-bar
                    stat-icon
                    text-blue-700">

                </i>

                <p>Sampling</p>

                <h2
                    class="
                    text-3xl
                    font-bold
                    text-blue-700">

                    {{ array_sum($sampling) }}

                </h2>

            </div>

            <div class="card stat">

                <i
                    class="
                    fas fa-calendar
                    stat-icon
                    text-orange-500">

                </i>

                <p>Tahun Aktif</p>

                <h2
                    class="
                    text-3xl
                    font-bold
                    text-orange-500">

                    {{ $tahun }}

                </h2>

            </div>

            <div class="card stat">

                <i
                    class="
                    fas fa-database
                    stat-icon
                    text-purple-600">

                </i>

                <p>Total Data</p>

                <h2
                    class="
                    text-3xl
                    font-bold
                    text-purple-600">

                    {{ array_sum($datang)+array_sum($sampling) }}

                </h2>

            </div>

        </div>

        <div class="card">

            <h2 class="font-bold mb-4">

                Grafik Monitoring Sampel

            </h2>

            <div style="height:400px">

                <canvas

                    id="chartSampel"

                    data-datang='@json($datang)'

                    data-sampling='@json($sampling)'>

                </canvas>

            </div>

        </div>

    </div>

    <script>
        particlesJS(
            "particles-js", {

                particles: {

                    number: {
                        value: 65
                    },

                    color: {
                        value: "#16A34A"
                    },

                    shape: {
                        type: "circle"
                    },

                    opacity: {
                        value: .22
                    },

                    size: {
                        value: 4,
                        random: true
                    },

                    move: {
                        enable: true,
                        speed: 1
                    },

                    line_linked: {

                        enable: true,

                        distance: 140,

                        color: "#16A34A",

                        opacity: .1,

                        width: 1

                    }

                }

            }

        );

        const canvas =
            document.getElementById(
                'chartSampel'
            );

        new Chart(canvas, {

            type: 'bar',

            data: {

                labels: [

                    'Jan', 'Feb', 'Mar',
                    'Apr', 'Mei', 'Jun',
                    'Jul', 'Agu', 'Sep',
                    'Okt', 'Nov', 'Des'

                ],

                datasets: [

                    {

                        label: 'Sampel Datang',

                        data: JSON.parse(
                            canvas.dataset.datang
                        ),

                        backgroundColor: '#16A34A',

                        borderRadius: 10

                    },

                    {

                        label: 'Sampling',

                        data: JSON.parse(
                            canvas.dataset.sampling
                        ),

                        backgroundColor: '#2563EB',

                        borderRadius: 10

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