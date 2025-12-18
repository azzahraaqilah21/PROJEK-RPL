<div class="w-64 bg-gradient-to-b from-black via-gray-900 to-gray-800 text-white
            p-6 min-h-screen shadow-xl flex flex-col justify-between">

    <!-- TOP SECTION -->
    <div>
        <!-- LOGO -->
        <div class="flex items-center gap-3 mb-6">
            <img src="/image/logo.png"
                 class="w-12 h-12 object-cover rounded-lg shadow-md">
            <div>
                <h2 class="text-xl font-bold tracking-wide text-gray-200 leading-tight">
                    Bandung <br> Perfume
                </h2>
            </div>
        </div>

        <!-- MENU -->
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center px-3 py-2 rounded-lg
                          hover:bg-gray-700 transition font-medium text-gray-300">
                    <i class="fas fa-tachometer-alt mr-3 w-5"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('admin.parfum.index') }}"
                   class="flex items-center px-3 py-2 rounded-lg
                          hover:bg-gray-700 transition font-medium text-gray-300">
                    <i class="fas fa-box mr-3 w-5"></i>
                    Produk
                </a>
            </li>
        </ul>
    </div>
    <!-- LOG OUT -->
    <form action="{{ route('admin.logout') }}" method="POST" class="mt-4">
    @csrf
    <button
        class="w-full flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg font-semibold">
        <i class="fas fa-sign-out-alt mr-2"></i> Logout
    </button>
</form>

</div>
