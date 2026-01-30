<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Password - Readify</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center font-sans
bg-gradient-to-br from-amber-50 via-white to-rose-50
dark:from-gray-900 dark:via-gray-950 dark:to-black">

<div class="w-full max-w-md p-[2px] rounded-3xl bg-gradient-to-br from-amber-400 via-rose-400 to-purple-400 shadow-2xl">

    <div class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-3xl p-8 text-center">

        <!-- ICON -->
        <div class="text-6xl mb-3">🔐</div>

        <!-- TITLE -->
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">
            Konfirmasi Password
        </h1>

        <p class="text-gray-500 dark:text-gray-400 text-sm mb-6 leading-relaxed">
            Demi keamanan akun, silakan masukkan kembali password kamu
            untuk melanjutkan.
        </p>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4 text-left">
            @csrf

            <!-- PASSWORD -->
            <div>
                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                    Password
                </label>
                <input type="password" name="password" required autofocus
                    class="w-full mt-1 px-4 py-2 rounded-xl border border-gray-300
                    focus:ring-2 focus:ring-amber-400 focus:outline-none
                    dark:bg-gray-800 dark:border-gray-700 dark:text-white">

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full py-3 mt-4 rounded-xl font-semibold text-white
                bg-gradient-to-r from-amber-500 to-rose-500
                hover:scale-105 hover:shadow-lg transition duration-300">
                Konfirmasi
            </button>

            <!-- BACK -->
            <p class="text-center text-sm text-gray-500 mt-4 dark:text-gray-400">
                <a href="{{ url()->previous() }}"
                   class="text-amber-500 font-semibold hover:underline">
                    Kembali
                </a>
            </p>

        </form>

        <!-- FOOTER -->
        <p class="text-xs text-gray-400 mt-6">
            © {{ date('Y') }} Readify Digital Library
        </p>

    </div>
</div>

</body>
</html>
