<nav x-data="{ open: false }">

    <!-- SIDEBAR -->

    <div
        class="fixed top-0 left-0
w-64 h-screen
bg-gradient-to-b
from-green-800
to-emerald-700
shadow-2xl
text-white
flex flex-col
justify-between
z-50">

        <div>

            <!-- PROFILE -->

            <div
                class="text-center
py-8
border-b
border-green-600">

                <div
                    class="w-20 h-20
mx-auto
rounded-full
bg-white/20
flex
items-center
justify-center
text-3xl
mb-3">

                    <i class="fas fa-user"></i>

                </div>

                <h2
                    class="font-bold
text-lg">

                    {{ Auth::user()->name }}

                </h2>

                <p
                    class="text-sm
text-green-100">

                    UPT Lingkungan Hidup

                </p>

            </div>

            <!-- MENU -->

            <div class="mt-6 px-4">

                <a
                    href="{{ route('dashboard') }}"

                    class="
flex
items-center
gap-3
px-4
py-3
mb-2
rounded-xl

transition

duration-300

hover:bg-white/20

{{ request()->routeIs('dashboard')
? 'bg-white/20'
: '' }}

">

                    <i
                        class="
fas fa-chart-line
w-5
text-center">
                    </i>

                    Dashboard

                </a>

                <a
                    href="/data-sampel"

                    class="
flex
items-center
gap-3
px-4
py-3
mb-2
rounded-xl

transition

duration-300

hover:bg-white/20

">

                    <i
                        class="
fas fa-flask
w-5
text-center">
                    </i>

                    Data Sampel

                </a>

                <a
                    href="/stok-bahan"

                    class="
flex
items-center
gap-3
px-4
py-3
mb-2
rounded-xl

transition

duration-300

hover:bg-white/20

">

                    <i
                        class="
fas fa-box-open
w-5
text-center">
                    </i>

                    Stok Bahan

                </a>

                <a
                    href="/stok-alat"

                    class="
flex
items-center
gap-3
px-4
py-3
mb-2
rounded-xl

transition

duration-300

hover:bg-white/20

">

                    <i
                        class="
fas fa-tools
w-5
text-center">
                    </i>

                    Stok Alat

                </a>

            </div>

        </div>

        <!-- BAWAH -->

        <div
            class="
p-4
border-t
border-green-600">

            <a
                href="{{ route('profile.edit') }}"

                class="
flex
items-center
gap-3

mb-3

hover:text-green-200

">

                <i class="fas fa-user-cog"></i>

                Profile

            </a>

            <form
                method="POST"
                action="{{ route('logout') }}">

                @csrf

                <button

                    type="submit"

                    class="
w-full

bg-red-500

hover:bg-red-600

transition

py-3

rounded-xl

font-semibold

">

                    <i class="fas fa-sign-out-alt"></i>

                    Logout

                </button>

            </form>

        </div>

    </div>

    <!-- CONTENT OFFSET -->

    <div class="ml-64"></div>

</nav>