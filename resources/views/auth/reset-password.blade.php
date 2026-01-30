<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Readify</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center font-sans
bg-gradient-to-br from-amber-50 via-white to-rose-50
dark:from-gray-900 dark:via-gray-950 dark:to-black">

<div class="w-full max-w-md p-[2px] rounded-3xl bg-gradient-to-br from-amber-400 via-rose-400 to-purple-400 shadow-2xl">

    <div class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-3xl p-8">

        <!-- TITLE -->
        <div class="text-center mb-6">
            <div class="text-5xl mb-2">🔒</div>
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                Reset Password
            </h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm">
                Masukkan password baru untuk akunmu
            </p>
        </div>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
            @csrf

            <!-- TOKEN -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- EMAIL -->
            <div>
                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" name="email"
                    value="{{ old('email', $request->email) }}" required autofocus
                    class="w-full mt-1 px-4 py-2 rounded-xl border border-gray-300
                    focus:ring-2 focus:ring-amber-400 focus:outline-none
                    dark:bg-gray-800 dark:border-gray-700 dark:text-white">

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PASSWORD BARU -->
            <div>
                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                    Password Baru
                </label>
                <input type="password" name="password" required
                    class="w-full mt-1 px-4 py-2 rounded-xl border border-gray-300
                    focus:ring-2 focus:ring-amber-400 focus:outline-none
                    dark:bg-gray-800 dark:border-gray-700 dark:text-white">

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- KONFIRMASI PASSWORD -->
            <div>
                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                    Konfirmasi Password
                </label>
                <input type="password" name="password_confirmation" required
                    class="w-full mt-1 px-4 py-2 rounded-xl border border-gray-300
                    focus:ring-2 focus:ring-amber-400 focus:outline-none
                    dark:bg-gray-800 dark:border-gray-700 dark:text-white">

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full py-3 mt-4 rounded-xl font-semibold text-white
                bg-gradient-to-r from-amber-500 to-rose-500
                hover:scale-105 hover:shadow-lg transition duration-300">
                Reset Password
            </button>

            <!-- BACK LOGIN -->
            <p class="text-center text-sm text-gray-500 mt-4 dark:text-gray-400">
                Ingat password?
                <a href="{{ route('login') }}"
                   class="text-amber-500 font-semibold hover:underline">
                    Kembali ke Login
                </a>
            </p>

        </form>

    </div>
</div>

</body>
</html>
