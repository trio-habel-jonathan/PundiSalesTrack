@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Enhanced Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Detail Profil Sales</h1>
        <p class="text-gray-500 mt-2">Informasi lengkap profil sales</p>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Profile Photo Section -->
        <div class="bg-gradient-to-r from-gray-100 to-gray-50 p-8 border-b text-center">
            @if($profil->foto_profil)
                <div class="relative inline-block">
                    <img src="{{ asset('storage/' . $profil->foto_profil) }}" 
                         alt="Foto profil {{ $profil->nama }}" 
                         class="w-40 h-40 object-cover rounded-full ring-4 ring-white shadow-lg">
                </div>
            @else
                <div class="w-40 h-40 mx-auto flex items-center justify-center bg-white border-4 border-dashed border-gray-300 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            @endif
            <h2 class="text-xl font-semibold text-gray-800 mt-4">{{ $profil->nama }}</h2>
            <p class="text-gray-500">{{ $profil->jabatan->nama_jabatan ?? 'Tidak Tersedia' }}</p>
        </div>

        <!-- Profile Information -->
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tim Sales -->
                <div class="border-t pt-6">
                    <div class="flex items-start space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Tim Sales</label>
                            <p class="text-lg font-medium text-gray-900">{{ $profil->tim_sales->nama_tim_sales ?? 'Tidak Tersedia' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="border-t pt-6">
                    <div class="flex items-start space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Email</label>
                            <p class="text-lg font-medium text-gray-900">{{ $profil->users->email }}</p>
                        </div>
                    </div>
                </div>

              

                <!-- Phone -->
                <div class="border-t pt-6">
                    <div class="flex items-start space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.5165.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Nomor Telepon</label>
                            <p class="text-lg font-medium text-gray-900">{{ $profil->nomor_telepon }}</p>
                        </div>
                    </div>
                </div>

                <!-- Address -->
                <div class="border-t pt-6">
                    <div class="flex items-start space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Alamat</label>
                            <p class="mt-2 text-gray-700 leading-relaxed">{{ $profil->alamat }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-100">
                <a href="{{ route('profil_sales.index', $profil->id_profile_sales) }}" 
                   class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali</span>
                </a>
                <a href="{{ route('profil_sales.edit', $profil->id_profile_sales) }}" 
                   class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-900 transition-colors duration-200 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>Edit Profil</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection