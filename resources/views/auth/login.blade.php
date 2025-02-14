<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-indigo-600">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700">Login</h2>
        <form method="POST" action="{{ route('login') }}" class="mt-6">
            @csrf
            @if(session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal!',
                text: '{{ session("error") }}',
                confirmButtonColor: '#d33',
            });
        });
    </script>
@endif

            <!-- Email Address -->
            <div>
                <label for="email" class="text-gray-600 font-medium">Email</label>
                <input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500" type="email" name="email" required autofocus autocomplete="username">
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="text-gray-600 font-medium">Password</label>
                <input id="password" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500" type="password" name="password" required autocomplete="current-password">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center text-gray-600">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm">Remember me</span>
                </label>

                <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition">
                    Log in
                </button>
            </div>
            <div class="mt-4 text-center">
                <a href="/register" class="text-sm text-indigo-600 hover:underline">Belum punya akun? Daftar</a>
            </div>
        </form>
    </div>
</body>
</html>
