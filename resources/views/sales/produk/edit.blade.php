@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Header with Title -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Edit Produk</h1>
            <p class="text-sm text-gray-500 mt-1">Perbarui informasi produk</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm">
        <form action="{{ route('sales.produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

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
                                @if(isset($produk->fotoProduk[0]))
                                    <img id="preview-image-1" src="{{ asset('storage/' . $produk->fotoProduk[0]->foto) }}" alt="Preview Foto" class="w-full h-full object-cover rounded-lg">
                                    <span id="upload-text-1" class="hidden text-gray-400 text-sm">Foto 1</span>
                                @else
                                    <img id="preview-image-1" src="#" alt="Preview Foto" class="hidden w-full h-full object-cover rounded-lg">
                                    <span id="upload-text-1" class="text-gray-400 text-sm">Foto 1</span>
                                @endif
                            </div>
                            <input type="file" 
                                   name="foto_produk[]" 
                                   id="foto_produk_1" 
                                   class="hidden" 
                                   accept="image/*"
                                   onchange="previewImage(event, 1)">
                        </div>

                        <!-- Foto 2 -->
                        <div class="relative w-full aspect-square">
                            <div class="relative w-full h-full border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:border-blue-500 transition-all duration-200 flex items-center justify-center"
                                onclick="document.getElementById('foto_produk_2').click()">
                                @if(isset($produk->fotoProduk[1]))
                                    <img id="preview-image-2" src="{{ asset('storage/' . $produk->fotoProduk[1]->foto) }}" alt="Preview Foto" class="w-full h-full object-cover rounded-lg">
                                    <span id="upload-text-2" class="hidden text-gray-400 text-sm">Foto 2</span>
                                @else
                                    <img id="preview-image-2" src="#" alt="Preview Foto" class="hidden w-full h-full object-cover rounded-lg">
                                    <span id="upload-text-2" class="text-gray-400 text-sm">Foto 2</span>
                                @endif
                            </div>
                            <input type="file" 
                                   name="foto_produk[]" 
                                   id="foto_produk_2" 
                                   class="hidden" 
                                   accept="image/*"
                                   onchange="previewImage(event, 2)">
                        </div>

                        <!-- Foto 3 -->
                        <div class="relative w-full aspect-square">
                            <div class="relative w-full h-full border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:border-blue-500 transition-all duration-200 flex items-center justify-center"
                                onclick="document.getElementById('foto_produk_3').click()">
                                @if(isset($produk->fotoProduk[2]))
                                    <img id="preview-image-3" src="{{ asset('storage/' . $produk->fotoProduk[2]->foto) }}" alt="Preview Foto" class="w-full h-full object-cover rounded-lg">
                                    <span id="upload-text-3" class="hidden text-gray-400 text-sm">Foto 3</span>
                                @else
                                    <img id="preview-image-3" src="#" alt="Preview Foto" class="hidden w-full h-full object-cover rounded-lg">
                                    <span id="upload-text-3" class="text-gray-400 text-sm">Foto 3</span>
                                @endif
                            </div>
                            <input type="file" 
                                   name="foto_produk[]" 
                                   id="foto_produk_3" 
                                   class="hidden" 
                                   accept="image/*"
                                   onchange="previewImage(event, 3)">
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
                           value="{{ old('nama_produk', $produk->nama_produk) }}" 
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
                    <input type="number" 
                           name="harga" 
                           value="{{ old('harga', $produk->harga) }}" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('harga') border-red-500 @enderror"
                           placeholder="Masukkan harga"
                           required>
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
                              required>{{ old('deskripsi_produk', $produk->deskripsi_produk) }}</textarea>
                    @error('deskripsi_produk')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-100">
                <button type="button" 
                        onclick="window.location='{{ route('sales.produk.index') }}'"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Preview Image Script -->
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
</script>
@endsection
