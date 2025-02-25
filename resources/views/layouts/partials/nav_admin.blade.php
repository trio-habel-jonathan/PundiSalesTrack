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
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="ml-3 font-medium">Dashboard</span>
        </a>

        <!-- Jadwal -->
        <a href="{{ route('jadwal.index')}}" class="flex items-center px-4 py-3 {{ request()->routeIs('jadwal.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="ml-3">Jadwal</span>
        </a>

        <!-- Users -->
        <a href="{{ route('users.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('users.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span class="ml-3">Sales</span>
        </a>

        <!-- Profile Sales -->
        <a href="{{ route('profil_sales.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('profil_sales.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="ml-3">Profil Sales</span>
        </a>

        <!-- Tim Sales -->
        <a href="{{ route('tim_sales.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('tim_sales.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span class="ml-3">Tim Sales</span>
        </a>

        <!-- Jabatan -->
        <a href="{{ route('jabatan.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('jabatan.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <span class="ml-3">Jabatan</span>
        </a>

        {{-- Produk --}}
        <a href="{{ route('produk.index')}}" class="flex items-center px-4 py-3 {{ request()->routeIs('produk.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            <span class="ml-3">Produk</span>
        </a>


        <!-- Lokasi -->
        <a href="{{ route('lokasi.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('lokasi.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="ml-3">Lokasi</span>
        </a>


        {{-- Klien --}}
        <a href="{{ route('klien.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('klien.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span class="ml-3">Klien</span>
        </a>


        <!-- Projects -->
        <a href="{{ route('kunjungan.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('kunjungan.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
            </svg>
            <span class="ml-3">Kunjungan</span>
        </a>

       

       <!-- Logout -->
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