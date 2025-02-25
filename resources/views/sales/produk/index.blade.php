@extends('layouts.app')

@section('content')
@section('title','Data Produk')
<div class="container mx-auto p-6">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Data Produk</h1>
            <p class="text-sm text-gray-500 mt-1">Data produk dalam satu tampilan</p>
        </div>

        <div class="flex items-center space-x-4">
            <form method="GET" action="{{ route('sales.produk.index') }}">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Produk..." 
                           class="w-64 px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="absolute right-3 top-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
            <a href="{{ route('sales.produk.create') }}" class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Produk</span>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        @forelse($produk as $item)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 flex items-center p-6">
            <div class="w-32 h-32 flex-shrink-0 mr-6">
                @if($item->fotoProduk->isNotEmpty())
                    <img src="{{ asset('storage/' . $item->fotoProduk->first()->foto) }}" alt="Foto Produk" class="w-full h-full object-cover rounded-lg">
                @else
                    <div class="flex items-center justify-center h-full bg-gray-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 007-7z" />
                        </svg>
                    </div>
                @endif
            </div>

            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900">{{ $item->nama_produk }}</h3>
                <p class="text-sm text-gray-600 mt-1">{{ $item->deskripsi_produk }}</p>
                <p class="text-sm text-blue-600 mt-1">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                <div class="mt-4 flex space-x-2">
                    <a href="{{ route('sales.produk.detail',$item->id_produk) }}" class="text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                    <a href="{{ route('sales.produk.edit',$item->id_produk) }}" class="text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                </div>

               
            </div>
        </div>
        @empty
        <div class="text-center text-gray-500 col-span-2">Tidak ada produk yang ditemukan</div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $produk->links() }}
    </div>
</div>
@endsection