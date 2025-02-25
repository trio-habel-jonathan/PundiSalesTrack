@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Detail Profil Kamu</h1>
            <p class="text-sm text-gray-500 mt-1">Informasi data profil kamu</p>
        </div>
    </div>

    @if($profil)
        <!-- Detail Card -->
        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6">
                <!-- Foto Profil -->
                <div class="flex justify-center mb-8">
                    @if($profil->foto_profil)
                        <img src="{{ asset('storage/' . $profil->foto_profil) }}" 
                             alt="Foto profil {{ $profil->nama }}" 
                             class="w-40 h-40 object-cover rounded-lg">
                    @else
                        <div class="w-40 h-40 flex items-center justify-center bg-gray-50 border-2 border-dashed border-gray-300 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" 
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    @endif
                </div>
                
                <!-- Informasi Detail -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                        <p class="text-gray-900">{{ $profil->nama }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tim Sales</label>
                        <p class="text-gray-900">{{ $profil->tim_sales->nama_tim_sales ?? 'Tidak Tersedia'}}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jabatan</label>
                        <p class="text-gray-900">{{ $profil->jabatan->nama_jabatan ?? 'Tidak Tersedia' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <p class="text-gray-900">{{ $profil->users->email }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                        <p class="text-gray-900">{{ $profil->nomor_telepon }}</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                        <p class="text-gray-900">{{ $profil->alamat }}</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-100">
                    <a href="{{ route('profil_sales.index', $profil->id_profile_sales) }}" 
                       class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors duration-200">
                        <span>Kembali</span>
                    </a>
                    <a href="{{ route('profil_sales.edit', $profil->id_profile_sales) }}" 
                       class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span>Edit Profil</span>
                    </a>
                </div>
            </div>
        </div>
    @else
        <!-- Card Jika Profil Tidak Ada -->
        <div class="bg-white rounded-xl shadow-sm p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-800">Profil Anda Belum Ada</h2>
            <p class="text-gray-500 mt-2">Silakan buat profil terlebih dahulu untuk melanjutkan.</p>
            <div class="mt-4">
                <a href="{{ route('sales.profil_sales.create') }}" 
                   class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-900 transition-colors duration-200">
                    Buat Profil
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
