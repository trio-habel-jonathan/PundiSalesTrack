@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Header with Title -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Tambah Produk</h1>
            <p class="text-sm text-gray-500 mt-1">Tambahkan produk baru ke sistem</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm">
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Foto Produk Fields -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Foto Produk
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- Foto 1 -->
                        <div class="relative w-full aspect-square">
                            <div class="relative w-full h-full border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:border-blue-500 transition-all duration-200 flex items-center justify-center"
                                onclick="document.getElementById('foto_produk_1').click()">
                                <img id="preview-image-1" src="#" alt="Preview Foto" class="hidden w-full h-full object-cover rounded-lg">
                                <span id="upload-text-1" class="text-gray-400 text-sm">Foto 1</span>
                            </div>
                            <input type="file" 
                                   name="foto_produk[]" 
                                   id="foto_produk_1" 
                                   class="hidden" 
                                   accept="image/*"
                                   onchange="previewImage(event, 1)" 
                                   required>
                        </div>

                        <!-- Foto 2 -->
                        <div class="relative w-full aspect-square">
                            <div class="relative w-full h-full border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:border-blue-500 transition-all duration-200 flex items-center justify-center"
                                onclick="document.getElementById('foto_produk_2').click()">
                                <img id="preview-image-2" src="#" alt="Preview Foto" class="hidden w-full h-full object-cover rounded-lg">
                                <span id="upload-text-2" class="text-gray-400 text-sm">Foto 2</span>
                            </div>
                            <input type="file" 
                                   name="foto_produk[]" 
                                   id="foto_produk_2" 
                                   class="hidden" 
                                   accept="image/*"
                                   onchange="previewImage(event, 2)" 
                                   required>
                        </div>

                        <!-- Foto 3 -->
                        <div class="relative w-full aspect-square">
                            <div class="relative w-full h-full border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:border-blue-500 transition-all duration-200 flex items-center justify-center"
                                onclick="document.getElementById('foto_produk_3').click()">
                                <img id="preview-image-3" src="#" alt="Preview Foto" class="hidden w-full h-full object-cover rounded-lg">
                                <span id="upload-text-3" class="text-gray-400 text-sm">Foto 3</span>
                            </div>
                            <input type="file" 
                                   name="foto_produk[]" 
                                   id="foto_produk_3" 
                                   class="hidden" 
                                   accept="image/*"
                                   onchange="previewImage(event, 3)" 
                                   required>
                        </div>
                    </div>
                    <p class="mt-1 text-sm text-gray-500 text-center">Format: JPG, JPEG, PNG (Max. 2MB)</p>
                    @error('foto_produk')
                        <p class="mt-1 text-sm text-red-500 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Produk -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Produk
                    </label>
                    <input type="text" 
                           name="nama_produk" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama_produk') border-red-500 @enderror"
                           placeholder="Masukkan nama produk"
                           required>
                    @error('nama_produk')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

           
               <!-- Harga -->
               <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Harga
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">Rp</span>
                    </div>
                    <input type="text" 
                           id="display_harga"
                           class="w-full pl-12 pr-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('harga') border-red-500 @enderror"
                           placeholder="0"
                           onkeyup="formatCurrency(this)"
                           required>
                    <input type="hidden" name="harga" id="harga_value">
                </div>
                @error('harga')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

                <!-- Deskripsi Produk -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi Produk
                    </label>
                    <textarea name="deskripsi_produk" 
                            class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('deskripsi_produk') border-red-500 @enderror"
                            placeholder="Masukkan deskripsi produk"
                            rows="3"
                            required></textarea>
                    @error('deskripsi_produk')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-100">
                <button type="button" 
                        onclick="window.location='{{ route('produk.index') }}'"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Simpan Produk</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
     function previewImage(event, index) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var imgElement = document.getElementById('preview-image-' + index);
            var uploadText = document.getElementById('upload-text-' + index);
            imgElement.src = reader.result;
            imgElement.classList.remove('hidden');
            uploadText.classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
    
    function formatCurrency(input) {
        // Hapus semua karakter non-digit
        let value = input.value.replace(/\D/g, '');
        
        // Konversi ke number
        let number = parseInt(value, 10);
        
        // Jika bukan angka, set menjadi 0
        if (isNaN(number)) {
            number = 0;
        }
        
        // Set nilai asli (yang akan dikirim ke server) ke input hidden
        document.getElementById('harga_value').value = number;
        
        // Format angka dengan pemisah ribuan
        input.value = new Intl.NumberFormat('id-ID').format(number);
    }
    
    // Tangani form submission
    document.querySelector('form').addEventListener('submit', function(e) {
        // Pastikan nilai harga sudah benar sebelum submit
        let displayHarga = document.getElementById('display_harga');
        let hargaValue = document.getElementById('harga_value');
        
        if (!hargaValue.value) {
            // Jika hidden field belum terisi, ambil dari display dan format
            let rawValue = displayHarga.value.replace(/\D/g, '');
            hargaValue.value = rawValue;
        }
    });
    
</script>
@endsection