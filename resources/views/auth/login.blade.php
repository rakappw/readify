<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Readify</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center font-sans
bg-gradient-to-br from-amber-50 via-white to-rose-50
dark:from-gray-900 dark:via-gray-950 dark:to-black">

<div class="w-full max-w-md p-[2px] rounded-3xl bg-gradient-to-br from-amber-400 via-rose-400 to-purple-400 shadow-2xl">

    <div class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-3xl p-8">

        <!-- TITLE -->
        <div class="text-center mb-6">
            <div class="text-5xl mb-2">📖</div>
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Masuk Akun</h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm">
                Selamat datang kembali di Readify
            </p>
        </div>

        <!-- STATUS SESSION -->
        @if (session('status'))
            <div class="mb-4 text-green-600 text-sm text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- EMAIL -->
            <div>
                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
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

            <!-- REMEMBER & FORGOT -->
            <div class="flex items-center justify-between text-sm mt-2">
                <label class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                    <input type="checkbox" name="remember"
                        class="rounded border-gray-300 text-amber-500 focus:ring-amber-400">
                    Remember me
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-amber-500 hover:underline">
                        Lupa password?
                    </a>
                @endif
            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full py-3 mt-4 rounded-xl font-semibold text-white
                bg-gradient-to-r from-amber-500 to-rose-500
                hover:scale-105 hover:shadow-lg transition duration-300">
                Login
            </button>

            <!-- REGISTER LINK -->
            <p class="text-center text-sm text-gray-500 mt-4 dark:text-gray-400">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-amber-500 font-semibold hover:underline">
                    Register
                </a>
            </p>

        </form>

    </div>
</div>

</body>
</html>
