<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Sekolah - Readify</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center font-sans
bg-gradient-to-br from-amber-50 via-white to-rose-50
dark:from-gray-900 dark:via-gray-950 dark:to-black">

<div class="w-full max-w-2xl p-[2px] rounded-3xl 
bg-gradient-to-br from-amber-400 via-rose-400 to-purple-400 shadow-2xl">

    <div class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-3xl p-10 text-center">

        <!-- ICON -->
        <div class="text-6xl mb-4">📚</div>

        <!-- TITLE -->
        <h1 class="text-4xl font-bold text-gray-800 dark:text-white mb-3">
            Perpustakaan Digital Sekolah
        </h1>

        <!-- DESC -->
        <p class="text-gray-500 dark:text-gray-400 mb-8 max-w-xl mx-auto">
            Sistem perpustakaan modern untuk mencari, meminjam,
            dan mengelola buku dengan mudah dan cepat.
        </p>

        <!-- BUTTON GROUP -->
        <div class="flex justify-center gap-4 flex-wrap">

            @auth
                <a href="{{ url('/dashboard') }}"
                   class="px-8 py-3 rounded-xl font-semibold text-white
                   bg-gradient-to-r from-amber-500 to-rose-500
                   hover:scale-105 hover:shadow-lg transition duration-300">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="px-8 py-3 rounded-xl font-semibold text-white
                   bg-gradient-to-r from-amber-500 to-rose-500
                   hover:scale-105 hover:shadow-lg transition duration-300">
                    Mulai Membaca
                </a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="px-8 py-3 rounded-xl font-semibold border
                   border-gray-300 text-gray-700
                   dark:border-gray-600 dark:text-gray-200
                   hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                    Daftar Akun
                </a>
                @endif
            @endauth

        </div>

        <!-- FOOTER -->
        <p class="mt-10 text-sm text-gray-400 dark:text-gray-500">
            © {{ date('Y') }} Readify Perpustakaan Sekolah
        </p>

    </div>
</div>

</body>
</html>
