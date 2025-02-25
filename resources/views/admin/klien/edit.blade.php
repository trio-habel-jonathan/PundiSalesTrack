@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Header with Title -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Edit Klien</h1>
            <p class="text-sm text-gray-500 mt-1">Perbarui Informasi klien</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm">
        <form action="{{ route('klien.update', $klien->id_klien) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('put')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- User Field -->
                <div class="md:col-span-2">
                <div>
                    <label for="id_lokasi" class="block text-sm font-medium text-gray-700 mb-2">
                        Pilih Lokasi
                    </label>
                    <select name="id_lokasi" 
                            id="id_lokasi" 
                            class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('id_lokasi') border-red-500 @enderror"
                            required>
                        <option value="">Pilih Lokasi</option>
                        @foreach($lokasi as $item)
                            <option value="{{ $item->id_lokasi }}" {{ $klien->id_klien == $item->id_lokasi ? 'selected' : '' }}>
    
                                {{ $item->alamat }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_lokasi')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                
                <!-- Nama Field -->
                <div>
                    <label for="nama_klien" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama
                    </label>
                    <input type="text" 
                           name="nama_klien" 
                           id="nama_klien" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama_klien') border-red-500 @enderror"
                           placeholder="Masukkan nama"
                           value="{{ old('nama_klien',$klien->nama_klien) }}"
                           required 
                           maxlength="100">
                    @error('nama_klien')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nomor Telepon Field -->
                <div>
                    <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor Telepon
                    </label>
                    <input type="text" 
                           name="nomor_telepon" 
                           id="nomor_telepon" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nomor_telepon') border-red-500 @enderror"
                           placeholder="Masukkan nomor telepon"
                           value="{{ old('nomor_telepon',$klien->nomor_telepon) }}"
                           required 
                           maxlength="20">
                    @error('nomor_telepon')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>
                    <input type="text" 
                           name="email" 
                           id="email" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                           placeholder="Masukkan email"
                           value="{{ old('email',$klien->email) }}"
                           required 
                           maxlength="20">
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
        

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-100">
                <button type="button" 
                        onclick="window.location='{{ route('klien.index') }}'"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Perbarui Klien</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection