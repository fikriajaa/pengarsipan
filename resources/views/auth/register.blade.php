<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center bg-gradient-to-r from-blue-500 to-indigo-600" >
    <div class="w-full max-w-md bg-white bg-opacity-90 p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700">Register</h2>
        <form method="POST" action="{{ route('register') }}" class="mt-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="text-gray-600 font-medium">Name</label>
                <input id="name" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-4 focus:ring-indigo-500 focus:outline-none" type="text" name="name" required autofocus autocomplete="name">
            </div>

            <!-- Email -->
            <div class="mt-4">
                <label for="email" class="text-gray-600 font-medium">Email</label>
                <input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-4 focus:ring-indigo-500 focus:outline-none" type="email" name="email" required autocomplete="username">
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="text-gray-600 font-medium">Password</label>
                <input id="password" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-4 focus:ring-indigo-500 focus:outline-none" type="password" name="password" required autocomplete="new-password">
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="text-gray-600 font-medium">Confirm Password</label>
                <input id="password_confirmation" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-4 focus:ring-indigo-500 focus:outline-none" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="mt-6 flex justify-between items-center">
                <a class="text-sm text-indigo-600 hover:underline" href="{{ route('login') }}">
                    Already registered?
                </a>
                <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition active:scale-95">
                    Register
                </button>
            </div>
        </form>
    </div>
</body>
</html>
