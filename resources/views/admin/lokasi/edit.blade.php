@extends('layouts.app')

@section('content')
@section('title', 'Edit Lokasi')

<div class="container mx-auto p-6">
    <!-- Header with Back and Actions -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Edit Lokasi</h1>
            <p class="text-sm text-gray-500 mt-1">Perbarui Informasi lokasi</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm">
        <form action="{{ route('lokasi.update',$lokasi->id_lokasi) }}" method="POST" class="p-6">
            @csrf
            @method('put')
            
            <div class="grid grid-cols-1 gap-6">
               
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                     Alamat
                    </label>
                    <textarea name="alamat" 
                    id="alamat" 
                    rows="4"
                    class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan deskripsi jabatan"
                    required>{{ old('alamat',$lokasi->alamat) }}</textarea>
          
                </div>
            </div>
            <div>
                <label for="provinsi" class="block text-sm font-medium text-gray-700 mb-2">
                   Provinsi
                </label>
                <input type="text" 
                       name="provinsi" 
                       id="provinsi" 
                       class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Masukkan nama provinsi"
                       value="{{ old('provinsi',$lokasi->provinsi) }}"
                       required>
            </div>
            <div>
                <label for="kota" class="block text-sm font-medium text-gray-700 mb-2">
                   Kota
                </label>
                <input type="text" 
                       name="kota" 
                       id="kota" 
                       class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Masukkan nama kota"
                       value="{{ old('kota',$lokasi->kota) }}"
                       required>
            </div>
            <div>
                <label for="longitude" class="block text-sm font-medium text-gray-700 mb-2">
                   Longitude
                </label>
                <input type="number" 
                       name="longitude" 
                       id="longitude" 
                       step="0.000001"
                       class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Masukkan longitude"
                       value="{{ old('longitude',$lokasi->longitude) }}"
                       required>
            </div>
            <div>
                <label for="longitude" class="block text-sm font-medium text-gray-700 mb-2">
                   Latitude
                </label>
                <input type="number" 
                       name="latitude" 
                       id="latitude" 
                       step="0.000001"
                       class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Masukkan latitude"
                       value="{{ old('latitude',$lokasi->latitude) }}"
                       required>
            </div>


            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-100">
                <button type="button" 
                        onclick="window.location='{{ route('lokasi.index') }}'"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors duration-200">
                    Cancel
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Perbarui Lokasi</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
