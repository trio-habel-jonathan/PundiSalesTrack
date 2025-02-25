@extends('layouts.app')

@section('content')
@section('title','Edit Jadwal')
<div class="container mx-auto p-6">
    <!-- Header with Title -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Edit Jadwal</h1>
            <p class="text-sm text-gray-500 mt-1">Perbarui Informasi jadwal</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm">
        <form action="{{ route('jadwal.update', $jadwal->id_jadwal) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- User Field -->
                <div class="md:col-span-2">
                    <div>
                        <label for="id_lokasi" class="block text-sm font-medium text-gray-700 mb-2">
                            Pilih Tim Sales
                        </label>
                        <select name="id_tim_sales" 
                                id="id_tim_sales" 
                                class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('id_tim_sales') border-red-500 @enderror"
                                required>
                            <option value="">Pilih Tim Sales</option>
                            @foreach($tim_sales as $item)
                                <option value="{{ $item->id_tim_sales }}" {{ $jadwal->id_tim_sales == $item->id_tim_sales ? 'selected' : '' }}>
                                    {{ $item->nama_tim_sales }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_tim_sales')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
    
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
                            <option value="{{ $item->id_lokasi }}" {{ $jadwal->id_lokasi == $item->id_lokasi ? 'selected' : '' }}>
                                {{ $item->alamat }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_lokasi')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                
                <!-- Tanggal Field -->
                <div>
                    <label for="tanggal_kunjungan" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Kunjungan
                    </label>
                    <input type="date" 
                           name="tanggal_kunjungan" 
                           id="tanggal_kunjungan" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tanggal_kunjungan') border-red-500 @enderror"
                           placeholder="Masukkan tanggal kunjungan"
                           value="{{ old('tanggal_kunjungan', $jadwal->tanggal_kunjungan) }}"
                           required 
                           maxlength="100">
                    @error('tanggal_kunjungan')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Field -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                        Status
                    </label>
                    <select name="status" 
                            id="status" 
                            class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror"
                            required>
                        <option value="">Pilih Status</option>
                        <option value="terjadwal" {{ $jadwal->status == 'terjadwal' ? 'selected' : '' }}>Terjadwal</option>
                        <option value="selesai" {{ $jadwal->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="dibatalkan" {{ $jadwal->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-100">
                <button type="button" 
                        onclick="window.location='{{ route('jadwal.index') }}'"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Perbarui Jadwal</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection