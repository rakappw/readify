<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Readify</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center font-sans
bg-gradient-to-br from-amber-50 via-white to-rose-50
dark:from-gray-900 dark:via-gray-950 dark:to-black">

<div class="w-full max-w-md p-[2px] rounded-3xl bg-gradient-to-br from-amber-400 via-rose-400 to-purple-400 shadow-2xl">

    <div class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-3xl p-8">

        <!-- TITLE -->
        <div class="text-center mb-6">
            <div class="text-5xl mb-2">📚</div>
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Daftar Akun</h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm">
                Buat akun untuk mulai membaca
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- NAME -->
            <div>
                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full mt-1 px-4 py-2 rounded-xl border border-gray-300
                    focus:ring-2 focus:ring-amber-400 focus:outline-none
                    dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- EMAIL -->
            <div>
                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full mt-1 px-4 py-2 rounded-xl border border-gray-300
                    focus:ring-2 focus:ring-amber-400 focus:outline-none
                    dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input type="password" name="password" required
                    class="w-full mt-1 px-4 py-2 rounded-xl border border-gray-300
                    focus:ring-2 focus:ring-amber-400 focus:outline-none
                    dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- CONFIRM PASSWORD -->
            <div>
                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required
                    class="w-full mt-1 px-4 py-2 rounded-xl border border-gray-300
                    focus:ring-2 focus:ring-amber-400 focus:outline-none
                    dark:bg-gray-800 dark:border-gray-700 dark:text-white">
            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full py-3 mt-4 rounded-xl font-semibold text-white
                bg-gradient-to-r from-amber-500 to-rose-500
                hover:scale-105 hover:shadow-lg transition duration-300">
                Register
            </button>

            <!-- LOGIN LINK -->
            <p class="text-center text-sm text-gray-500 mt-4 dark:text-gray-400">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-amber-500 font-semibold hover:underline">
                    Login
                </a>
            </p>

        </form>

    </div>
</div>

</body>
</html>
