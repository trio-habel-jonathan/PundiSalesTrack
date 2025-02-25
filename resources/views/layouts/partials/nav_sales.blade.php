<div class="fixed left-0 top-0 h-screen w-64 bg-white shadow-lg p-6">
    <!-- Logo Section -->
    <div class="mb-8">
        <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-black rounded-lg"></div>
            <span class="text-lg font-bold">PundiSalesTrack</span>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="space-y-2">
     


        <!-- Jadwal -->
        <a href="{{ route('sales.jadwal.index')}}" class="flex items-center px-4 py-3 {{ request()->routeIs('sales.jadwal.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="ml-3">Jadwal</span>
        </a>

        <!-- Profile Sales -->
        <a href="{{ route('sales.profil_sales.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('sales.profil_sales.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="ml-3">Profil Sales</span>
        </a>

        <!-- Tim Sales -->
        <a href="{{ route('sales.tim_sales.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('sales.tim_sales.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span class="ml-3">Tim Sales</span>
        </a>


        {{-- Produk --}}
        <a href="{{ route('sales.produk.index')}}" class="flex items-center px-4 py-3 {{ request()->routeIs('sales.produk.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            <span class="ml-3">Produk</span>
        </a>

        <!-- Projects -->
        <a href="{{ route('sales.kunjungan.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('sales.kunjungan.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
            </svg>
            <span class="ml-3">Kunjungan</span>
        </a>


        <form action="{{ route('logout') }}" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="w-full flex items-center px-4 py-3 text-red-700 hover:bg-red-50 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="ml-3">Logout</span>
            </button>
        </form>
    </nav>
</div>