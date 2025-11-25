<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="relative flex items-center justify-center min-h-screen px-4"
      style="background: url('https://source.unsplash.com/1600x900/?technology') no-repeat center center; background-size: cover;">

<!-- Overlay blur -->
<div class="absolute inset-0 bg-black bg-opacity-40 backdrop-blur-md"></div>

<!-- Form card -->
<div class="relative w-full max-w-md bg-neutral-900 bg-opacity-90 p-10 rounded-3xl shadow-2xl border border-neutral-800 z-10 transform transition-all hover:scale-105">
    <h2 class="text-3xl font-bold text-center mb-8 text-white">Admin Login</h2>

    <!-- Form Login -->
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf

        <!-- Username -->
        <div class="mb-6">
            <label class="text-sm text-gray-300 mb-2 block">Username</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                    <!-- Icon User -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
                        <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                    </svg>
                </span>
                <input type="text" name="username"
                       class="w-full bg-neutral-800 bg-opacity-80 px-12 py-3 rounded-xl outline-none
                              focus:ring-2 focus:ring-gray-400 placeholder-gray-400 text-white"
                       placeholder="admin123">
            </div>
            @error('username')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-8">
            <label class="text-sm text-gray-300 mb-2 block">Password</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                    <!-- Icon Password -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                         stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75
                                 0h10.5A2.25 2.25 0 0119.5 12.75v6A2.25 2.25
                                 0 0117.25 21H6.75A2.25 2.25 0 014.5
                                 18.75v-6A2.25 2.25 0 016.75 10.5z" />
                    </svg>
                </span>
                <input type="password" name="password"
                       class="w-full bg-neutral-800 bg-opacity-80 px-12 py-3 rounded-xl outline-none
                              focus:ring-2 focus:ring-gray-400 placeholder-gray-400 text-white"
                       placeholder="••••••••">
            </div>
            @error('password')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Login -->
        <button
                class="w-full py-3 rounded-xl font-semibold text-white
                bg-gradient-to-r from-[#2D2D2D] via-[#4A4A4A] to-[#C19552]
                shadow-lg transition-all duration-300 ease-out
                hover:scale-105 hover:shadow-2xl hover:brightness-110">
                    Login
        </button>


    </form>

    <!-- Link ke Home -->
    <p class="text-xs text-gray-300 text-center mt-6">
        <a href="/" class="hover:text-white">← Kembali ke Home</a>
    </p>
</div>


</body>
</html>
