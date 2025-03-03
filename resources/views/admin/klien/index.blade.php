@extends('layouts.app')

@section('content')
@section('title', 'Kelola Klien')
<div class="container mx-auto p-6">
    <!-- Header with Search and Actions -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Kelola Klien</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola klien dalam satu tampilan</p>
        </div>
        
        <div class="flex items-center space-x-4">
            <form method="GET" action="{{ route('klien.index') }}">
                <div class="relative">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Cari Klien..." 
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
            <a href="{{ route('klien.create') }}" 
               class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Klien</span>
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
                           Nomor Telepon
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Alamat 
                         </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($klien as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->nama_klien}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->nomor_telepon}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->email}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->lokasi->alamat}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            <a href="{{ route('klien.edit', $item->id_klien) }}" 
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
                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                           Tidak ada Klien yang ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    {{-- <div class="mt-6">
        {{ $jabatan->links() }}
    </div> --}}
</div>
@endsection