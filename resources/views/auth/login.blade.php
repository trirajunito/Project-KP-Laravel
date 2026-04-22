<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - UPTD Lingkungan Hidup</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">
        
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-green-700">UPTD Lingkungan Hidup</h1>
            <p class="text-gray-500 text-sm">Sistem Monitoring & Pengelolaan Data</p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-sm text-gray-600 mb-1">Email</label>
                <input type="username" name="username" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-sm text-gray-600 mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- Remember -->
            <div class="flex items-center mb-4">
                <input type="checkbox" name="remember" class="mr-2">
                <label class="text-sm text-gray-600">Ingat saya</label>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">
                Login
            </button>
        </form>

        <!-- Footer -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © 2026 UPTD Lingkungan Hidup
        </p>
    </div>

</body>
</html>