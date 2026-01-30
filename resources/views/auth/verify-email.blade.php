<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - Readify</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center font-sans
bg-gradient-to-br from-amber-50 via-white to-rose-50
dark:from-gray-900 dark:via-gray-950 dark:to-black">

<div class="w-full max-w-md p-[2px] rounded-3xl bg-gradient-to-br from-amber-400 via-rose-400 to-purple-400 shadow-2xl">

    <div class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-3xl p-8 text-center">

        <!-- ICON -->
        <div class="text-6xl mb-3">✉️</div>

        <!-- TITLE -->
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">
            Verifikasi Email
        </h1>

        <p class="text-gray-500 dark:text-gray-400 text-sm mb-6 leading-relaxed">
            Kami telah mengirim link verifikasi ke email kamu.  
            Silakan cek inbox dan klik link tersebut untuk mengaktifkan akun.
        </p>

        <!-- STATUS -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-green-600 text-sm font-medium">
                Link verifikasi baru telah dikirim ke email kamu.
            </div>
        @endif

        <!-- BUTTON GROUP -->
        <div class="flex flex-col gap-3">

            <!-- RESEND -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="w-full py-3 rounded-xl font-semibold text-white
                    bg-gradient-to-r from-amber-500 to-rose-500
                    hover:scale-105 hover:shadow-lg transition duration-300">
                    Kirim Ulang Email
                </button>
            </form>

            <!-- LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full py-3 rounded-xl font-semibold
                    border border-gray-300 dark:border-gray-700
                    text-gray-700 dark:text-gray-200
                    hover:bg-gray-100 dark:hover:bg-gray-800
                    transition duration-300">
                    Keluar
                </button>
            </form>

        </div>

        <!-- FOOTER -->
        <p class="text-xs text-gray-400 mt-6">
            © {{ date('Y') }} Readify Digital Library
        </p>

    </div>
</div>

</body>
</html>
