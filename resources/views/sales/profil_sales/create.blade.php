@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Header with Title -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Tambah Profil Sales</h1>
            <p class="text-sm text-gray-500 mt-1">Tambahkan profil sales baru ke sistem</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm">
        <form action="{{ route('sales.profil_sales.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- User Field -->
                <div class="md:col-span-2">
                    <label for="foto_profil" class="block text-sm font-medium text-gray-700 mb-2">
                        Foto Profil
                    </label>
                    <div class="relative w-40 h-40 mx-auto border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:border-blue-500 transition-all duration-200 flex items-center justify-center"
                         onclick="document.getElementById('foto_profil').click()">
                        <img id="preview-image" src="#" alt="Preview Foto" class="hidden w-full h-full object-contain rounded-lg">
                        <span id="upload-text" class="text-gray-400 text-sm">Klik untuk upload</span>
                    </div>
                    <input type="file" name="foto_profil" id="foto_profil" class="hidden" accept="image/jpeg,image/png,image/jpg" onchange="previewImage(event)">
                    <p class="mt-1 text-sm text-gray-500 text-center">Format: JPG, JPEG, PNG (Max. 2MB)</p>
                    @error('foto_profil')
                        <p class="mt-1 text-sm text-red-500 text-center">{{ $message }}</p>
                    @enderror
                </div>
                
                <script>
                    function previewImage(event) {
                        var input = event.target;
                        var reader = new FileReader();
                        reader.onload = function () {
                            var imgElement = document.getElementById('preview-image');
                            var uploadText = document.getElementById('upload-text');
                            imgElement.src = reader.result;
                            imgElement.classList.remove('hidden');
                            uploadText.classList.add('hidden');
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                </script>
                
                

                <!-- Nama Field -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama
                    </label>
                    <input type="text" 
                           name="nama" 
                           id="nama" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama') border-red-500 @enderror"
                           placeholder="Masukkan nama"
                           value="{{ old('nama') }}"
                           required 
                           maxlength="100">
                    @error('nama')
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
                           value="{{ old('nomor_telepon') }}"
                           required 
                           maxlength="20">
                    @error('nomor_telepon')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat Field -->
                <div class="md:col-span-2">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                        Alamat
                    </label>
                    <textarea name="alamat" 
                              id="alamat" 
                              class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('alamat') border-red-500 @enderror"
                              placeholder="Masukkan alamat"
                              required 
                              maxlength="255">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Foto Profil Field -->
                
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-100">
                <button type="button" 
                        onclick="window.location='{{ route('profil_sales.index') }}'"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Simpan Profil Sales</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection