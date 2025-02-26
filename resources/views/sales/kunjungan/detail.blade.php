@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Enhanced Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-semibold">Detail Kunjungan</h1>
        <p class="text-gray-500 mt-2 mt-1">Informasi lengkap kunjungan</p>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Photo Gallery Section -->
        <div class="bg-gray-50 p-6 border-b">
            <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Bukti Kunjungan
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @forelse($kunjungan->fotoKunjungan as $foto)
                    <div class="aspect-square group relative overflow-hidden rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <img src="{{ asset('storage/' . $foto->foto) }}" 
                             class="w-full h-full object-contain transform hover:scale-105 transition-transform duration-300 rounded-xl"
                             alt="Foto kunjungan">
                    </div>
                @empty
                    <div class="aspect-square flex items-center justify-center bg-white border-2 border-dashed border-gray-300 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Visit Information Section -->
        <div class="p-6 space-y-6">
            <!-- Client and Product Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <!-- Client Name -->
                    <div class="flex items-start space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Nama Klien</label>
                            <p class="text-lg font-medium text-gray-900">{{ $kunjungan->klien->nama_klien }}</p>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="flex items-start space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Produk Yang Ditawarkan</label>
                            <p class="text-lg font-medium text-gray-900">
                                {{ $kunjungan->produk->nama_produk }}
                                <a href="{{ route('produk.detail',$kunjungan->produk->id_produk) }}" 
                                   class="ml-2 text-blue-600 hover:text-blue-800 text-sm">
                                    Detail Produk →
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <!-- Sales Name -->
                    <div class="flex items-start space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Nama Sales</label>
                            <p class="text-lg font-medium text-gray-900">{{ $kunjungan->profil_sales->nama }}</p>
                        </div>
                    </div>

                    <!-- Visit Time -->
                    <div class="flex items-start space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Waktu Kunjungan</label>
                            <div class="space-y-1">
                                <p class="text-gray-900">Mulai: {{ $kunjungan->waktu_mulai }}</p>
                                <p class="text-gray-900">Selesai: {{ $kunjungan->waktu_selesai }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity Description -->
            <div class="border-t pt-6">
                <div class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <div class="flex-1">
                        <label class="text-sm font-medium text-gray-500">Deskripsi Aktivitas</label>
                        <p class="mt-2 text-gray-700 leading-relaxed">{{ $kunjungan->deskripsi_aktivitas }}</p>
                    </div>
                </div>
            </div>

            <!-- Status and Actions -->
            <div class="flex items-center justify-between border-t pt-6">
                
                <span class="px-4 py-2 rounded-full text-sm font-medium 
                @if ($kunjungan->status == 'selesai') bg-green-100 text-green-800 
                @elseif ($kunjungan->status == 'negoisasi') bg-blue-100 text-blue-800 
                @elseif ($kunjungan->status == 'dibatalkan') bg-red-100 text-red-800 
                @else bg-gray-100 text-gray-800 
                @endif">
                Status: {{ ucfirst($kunjungan->status) }}
            </span>
            

                <div class="flex space-x-4">
                    <a href="{{ route('sales.kunjungan.index') }}" 
                       class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection