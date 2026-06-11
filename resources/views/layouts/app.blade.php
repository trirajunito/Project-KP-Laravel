<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}">

    <title>

        {{ config('app.name','UPT Lingkungan Hidup') }}

    </title>

    <!-- FONT -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link

        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"

        rel="stylesheet">

    <!-- ICON -->

    <link

        rel="stylesheet"

        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- PARTICLE -->

    <script

        src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js">

    </script>

    @vite([

    'resources/css/app.css',

    'resources/js/app.js'

    ])

    <style>
        * {

            font-family:
                'Poppins',
                sans-serif;

        }

        body {

            margin: 0;

            padding: 0;

            background:

                linear-gradient(135deg,
                    #F0FDF4,
                    #DCFCE7);

            overflow-x: hidden;

            min-height: 100vh;

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

        .background-glow {

            position: fixed;

            width: 450px;

            height: 450px;

            border-radius: 50%;

            filter: blur(120px);

            opacity: .16;

            z-index: -2;

            animation:

                floatGlow 18s infinite alternate;

        }

        .glow1 {

            background:

                #22C55E;

            top: -120px;

            left: -100px;

        }

        .glow2 {

            background:

                #3B82F6;

            bottom: -120px;

            right: -100px;

            animation-delay: 4s;

        }

        /* FLOAT */

        @keyframes floatGlow {

            0% {

                transform:

                    translateX(0) translateY(0);

            }

            100% {

                transform:

                    translateX(40px) translateY(60px);

            }

        }

        /* MAIN */

        .main-wrapper {

            position: relative;

            z-index: 2;

        }

        /* HEADER */

        header {

            background:

                rgba(255,
                    255,
                    255,
                    .85);

            backdrop-filter:

                blur(12px);

            border-radius:

                0 0 20px 20px;

            box-shadow:

                0 8px 30px rgba(0,
                    0,
                    0,
                    .08);

        }

        /* CARD */

        .dashboard-card {

            background:

                rgba(255,
                    255,
                    255,
                    .88);

            backdrop-filter:

                blur(12px);

            border-radius:

                22px;

            padding:

                25px;

            box-shadow:

                0 10px 30px rgba(0,
                    0,
                    0,
                    .08);

            transition: .3s;

        }

        .dashboard-card:hover {

            transform:

                translateY(-5px);

            box-shadow:

                0 18px 40px rgba(0,
                    0,
                    0,
                    .12);

        }

        /* SCROLL */

        ::-webkit-scrollbar {

            width: 8px;

        }

        ::-webkit-scrollbar-thumb {

            background:

                #16A34A;

            border-radius:

                20px;

        }

        ::-webkit-scrollbar-track {

            background:

                #E5E7EB;

        }
    </style>

</head>

<body
    class="font-sans antialiased">

    <!-- BACKGROUND -->

    <div id="particles-js"></div>

    <div
        class="
background-glow
glow1">

    </div>

    <div
        class="
background-glow
glow2">

    </div>

    <div class="main-wrapper">

        <div class="min-h-screen">

            @include('layouts.navigation')

            @if(isset($header))

            <header>

                <div

                    class="
max-w-7xl
mx-auto
py-6
px-4
sm:px-6
lg:px-8">

                    {{ $header }}

                </div>

            </header>

            @endif

            <main>

                {{ $slot }}

            </main>

        </div>

    </div>

    <script>
        particlesJS(

            "particles-js",

            {

                particles: {

                    number: {

                        value: 65,

                        density: {

                            enable: true,

                            value_area: 1000

                        }

                    },

                    color: {

                        value: [

                            "#16A34A",

                            "#22C55E",

                            "#3B82F6",

                            "#0EA5E9"

                        ]

                    },

                    shape: {

                        type: [

                            "circle",

                            "triangle"

                        ]

                    },

                    opacity: {

                        value: .25,

                        random: true,

                        anim: {

                            enable: true,

                            speed: .5,

                            opacity_min: .08

                        }

                    },

                    size: {

                        value: 5,

                        random: true,

                        anim: {

                            enable: true,

                            speed: 2,

                            size_min: 1

                        }

                    },

                    move: {

                        enable: true,

                        speed: 1.2,

                        direction: "none",

                        random: true,

                        straight: false,

                        out_mode: "out"

                    },

                    line_linked: {

                        enable: true,

                        distance: 140,

                        color: "#16A34A",

                        opacity: .12,

                        width: 1

                    }

                },

                interactivity: {

                    detect_on: "canvas",

                    events: {

                        onhover: {

                            enable: true,

                            mode: "grab"

                        },

                        onclick: {

                            enable: true,

                            mode: "push"

                        },

                        resize: true

                    },

                    modes: {

                        grab: {

                            distance: 150,

                            line_linked: {

                                opacity: .3

                            }

                        },

                        push: {

                            particles_nb: 4

                        }

                    }

                },

                retina_detect: true

            }

        );
    </script>

</body>

</html>