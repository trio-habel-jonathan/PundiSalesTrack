@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Profil Sales</h1>
            <p class="text-sm text-gray-500 mt-1">kelola semua data nama profil sales</p>
        </div>

        <div class="flex items-center space-x-4">
            <form method="GET" action="{{ route('profil_sales.index') }}">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search profiles..." 
                           class="w-64 px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="absolute right-3 top-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
            <a href="{{ route('profil_sales.create') }}" class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Profile</span>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        @forelse($profil_sales as $item)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 flex items-center p-6">
            <div class="w-32 h-32 flex-shrink-0 mr-6">
                @if($item->foto_profil)
                    <img src="{{ asset('storage/' . $item->foto_profil) }}" alt="Profile photo of {{ $item->nama }}" class="w-full h-full object-cover rounded-lg">
                @else
                    <div class="flex items-center justify-center h-full bg-gray-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                @endif
            </div>

            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900">{{ $item->nama }}</h3>
                <p class="text-sm text-blue-600 mt-1">{{ $item->tim_sales->nama_tim_sales ?? 'Tidak Tersedia'}}</p>
                <div class="space-y-2 text-sm text-gray-600 mt-4">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>{{ $item->nomor_telepon }}</span>
                    </div>
                </div>
            </div>

            <!-- Tombol Edit dan Hapus -->
            <div class="flex flex-col space-y-2 ml-6">
                <a href="{{ route('profil_sales.detail', $item->id_profile_sales) }}" 
                    class="text-gray-600 hover:text-gray-900 p-2 rounded-lg hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                 </a>
                <a href="{{ route('profil_sales.edit', $item->id_profile_sales) }}" 
                   class="text-gray-600 hover:text-gray-900 p-2 rounded-lg hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
                <button onclick="openModal('{{ route('profil_sales.destroy', $item->id_profile_sales) }}', 'Hapus Profil Sales', 'Apakah kamu yakin ingin menghapus profil sales ini?')"
                    class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12 bg-white rounded-xl">
            <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada profil yang ditemukan</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating a new profile.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
