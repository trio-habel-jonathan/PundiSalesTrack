@extends('layouts.app')

@section('content')
@section('title', 'Kelola Kunjungan')
<div class="container mx-auto p-6">
    <!-- Header with Search and Actions -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Kelola Kunjungan</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola kunjungan dalam satu tampilan</p>
        </div>
        
        <div class="flex items-center space-x-4">
            <form method="GET" action="{{ route('kunjungan.index') }}" class="flex items-center space-x-3">
                <!-- Date Filters -->
                <div class="flex items-center space-x-2">
                    <div>
                        <input type="date" 
                               name="tanggal_mulai" 
                               value="{{ request('tanggal_mulai') }}" 
                               class="px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                               placeholder="Tanggal Mulai">
                    </div>
                    <span class="text-gray-500">s/d</span>
                    <div>
                        <input type="date" 
                               name="tanggal_selesai" 
                               value="{{ request('tanggal_selesai') }}" 
                               class="px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                               placeholder="Tanggal Selesai">
                    </div>
                </div>
                
                <!-- Search Field -->
                <div class="relative">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Cari Kunjungan..." 
                           class="w-64 px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="absolute right-3 top-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Create User Button -->
            <a href="{{ route('kunjungan.create') }}" 
               class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Kunjungan</span>
            </a>
        </div>
    </div>
   
    <div class="bg-white rounded-xl shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Nama Klien
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Produk
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Nama Sales
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Waktu Mulai
                         </th>
                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Waktu Selesai
                        </th>
                      
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Status
                         </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($kunjungan as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->klien->nama_klien}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->produk->nama_produk}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->profil_sales->nama}} - {{ $item->profil_sales->tim_sales->nama_tim_sales}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->waktu_mulai}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->waktu_selesai}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-medium rounded-full
                                {{ $item->status == 'gagal' ? 'bg-red-100 text-red-800' : 
                                   ($item->status == 'negoisasi' ? 'bg-yellow-100 text-yellow-800' : 
                                   'bg-green-100 text-green-800') }}">
                                {{ ucfirst($item->status) }}
                            </span>
                            
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            <a href="{{ route('kunjungan.detail',$item->id_kunjungan) }}" 
                                class="text-gray-600 hover:text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <a href="{{ route('kunjungan.edit', $item->id_kunjungan) }}" 
                               class="text-gray-600 hover:text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <button onclick="openModal('{{ route('klien.destroy', $item->id_klien) }}', 'Hapus Klien', 'Apakah Kamu Yakin Ingin Menghapus Klien Ini?')" 
                                    class="text-red-600 hover:text-red-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                           Tidak ada kunjungan yang ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $kunjungan->withQueryString()->links() }}
    </div>
</div>
@endsection