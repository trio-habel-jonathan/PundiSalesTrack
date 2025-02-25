@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Detail Produk</h1>
        <p class="text-gray-500 mt-2 text-lg">Informasi lengkap produk</p>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Photo Gallery Section -->
        <div class="bg-gray-50 p-6 border-b">
            <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Foto Produk
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @forelse($produk->fotoProduk as $foto)
                    <div class="aspect-square group relative overflow-hidden rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <img src="{{ asset('storage/' . $foto->foto) }}" 
                             class="w-full h-full object-contain transform hover:scale-105 transition-transform duration-300 rounded-xl"
                             alt="Foto produk {{ $produk->nama_produk }}">
                    </div>
                @empty
                    <div class="aspect-square flex items-center justify-center bg-white border-2 border-dashed border-gray-300 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Product Information Section -->
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Product Name -->
                <div class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Nama Produk</label>
                        <p class="text-lg font-medium text-gray-900">{{ $produk->nama_produk }}</p>
                    </div>
                </div>

                <!-- Harga -->
                <div class="flex items-start space-x-3">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Harga</label>
                        <p class="text-lg font-medium text-gray-900">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Produk -->
            <div class="border-t pt-6">
                <div class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <div class="flex-1">
                        <label class="text-sm font-medium text-gray-500">Deskripsi Produk</label>
                        <p class="mt-2 text-gray-700 leading-relaxed">{{ $produk->deskripsi_produk }}</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex space-x-4 justify-end">
                <a href="{{ route('sales.produk.index') }}" 
                   class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                    Kembali
                </a>
                <a href="{{ route('produk.edit', $produk->id_produk) }}" 
                   class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-900 transition-colors duration-200 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>Edit Produk</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
