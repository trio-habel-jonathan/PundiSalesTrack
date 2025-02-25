@extends('layouts.app')

@section('content')
@section('title','Tambah Kunjungan')
<div class="container mx-auto p-6">
    <!-- Header with Title -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Tambah Kunjungan</h1>
            <p class="text-sm text-gray-500 mt-1">Tambahkan klien baru ke sistem</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm">
        <form action="{{ route('kunjungan.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Pilih Klien -->
                <div class="md:col-span-2">
                    <label for="id_klien" class="block text-sm font-medium text-gray-700 mb-2">
                        Pilih Klien
                    </label>
                    <select name="id_klien" 
                            id="id_klien" 
                            class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('id_klien') border-red-500 @enderror"
                            required>
                        <option value="">Pilih Klien</option>
                        @foreach($klien as $item)
                            <option value="{{ $item->id_klien }}" {{ old('id_klien') == $item->id_klien ? 'selected' : '' }}>
                                {{ $item->nama_klien }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_klien')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pilih Jadwal -->
                <div class="md:col-span-2">
                    <label for="id_jadwal" class="block text-sm font-medium text-gray-700 mb-2">
                        Pilih Jadwal
                    </label>
                    <select name="id_jadwal" 
                            id="id_jadwal" 
                            class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('id_jadwal') border-red-500 @enderror"
                            required>
                        <option value="">Pilih Jadwal</option>
                        @foreach($jadwal as $item)
                            <option value="{{ $item->id_jadwal }}" {{ old('id_jadwal') == $item->id_jadwal ? 'selected' : '' }}>
                                {{ $item->tanggal_kunjungan }} - {{ $item->tim_sales->nama_tim_sales }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_jadwal')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pilih Sales -->
                <div class="md:col-span-2">
                    <label for="id_profile_sales" class="block text-sm font-medium text-gray-700 mb-2">
                        Pilih Sales
                    </label>
                    <select name="id_profile_sales" 
                            id="id_profile_sales" 
                            class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('id_profile_sales') border-red-500 @enderror"
                            required>
                        <option value="">Pilih Sales</option>
                        @foreach($profil_sales as $item)
                            <option value="{{ $item->id_profile_sales }}" {{ old('id_profile_sales') == $item->id_profile_sales ? 'selected' : '' }}>
                                {{ $item->nama }} - {{ $item->tim_sales->nama_tim_sales }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_profile_sales')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pilih Produk -->
                <div class="md:col-span-2">
                    <label for="id_produk" class="block text-sm font-medium text-gray-700 mb-2">
                        Pilih Produk
                    </label>
                    <select name="id_produk" 
                            id="id_produk" 
                            class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('id_produk') border-red-500 @enderror"
                            required>
                        <option value="">Pilih Produk</option>
                        @foreach($produk as $item)
                            <option value="{{ $item->id_produk }}" {{ old('id_produk') == $item->id_produk ? 'selected' : '' }}>
                                {{ $item->nama_produk }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_produk')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Waktu Mulai -->
                <div>
                    <label for="waktu_mulai" class="block text-sm font-medium text-gray-700 mb-2">
                        Waktu Mulai
                    </label>
                    <input type="datetime-local" 
                           name="waktu_mulai" 
                           id="waktu_mulai" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('waktu_mulai') border-red-500 @enderror"
                           value="{{ old('waktu_mulai') }}"
                           required>
                    @error('waktu_mulai')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Waktu Selesai -->
                <div>
                    <label for="waktu_selesai" class="block text-sm font-medium text-gray-700 mb-2">
                        Waktu Selesai
                    </label>
                    <input type="datetime-local" 
                           name="waktu_selesai" 
                           id="waktu_selesai" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('waktu_selesai') border-red-500 @enderror"
                           value="{{ old('waktu_selesai') }}"
                           required>
                    @error('waktu_selesai')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi Aktivitas -->
                <div class="md:col-span-2">
                    <label for="deskripsi_aktivitas" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi Aktivitas
                    </label>
                    <textarea name="deskripsi_aktivitas" 
                              id="deskripsi_aktivitas" 
                              rows="4"
                              class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('deskripsi_aktivitas') border-red-500 @enderror"
                              placeholder="Masukkan keterangan"
                              required>{{ old('deskripsi_aktivitas') }}</textarea>
                    @error('deskripsi_aktivitas')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Foto Bukti Kunjungan -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Foto Bukti Kunjungan
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- Foto 1 -->
                        <div class="relative w-full aspect-square">
                            <div class="relative w-full h-full border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:border-blue-500 transition-all duration-200 flex items-center justify-center"
                                onclick="document.getElementById('foto_kunjungan_1').click()">
                                <img id="preview-image-1" src="#" alt="Preview Foto" class="hidden w-full h-full object-cover rounded-lg">
                                <span id="upload-text-1" class="text-gray-400 text-sm">Foto 1</span>
                            </div>
                            <input type="file" 
                                   name="foto_kunjungan[]" 
                                   id="foto_kunjungan_1" 
                                   class="hidden" 
                                   accept="image/*"
                                   onchange="previewImage(event, 1)" 
                                   required>
                        </div>

                        <!-- Foto 2 -->
                        <div class="relative w-full aspect-square">
                            <div class="relative w-full h-full border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:border-blue-500 transition-all duration-200 flex items-center justify-center"
                                onclick="document.getElementById('foto_kunjungan_2').click()">
                                <img id="preview-image-2" src="#" alt="Preview Foto" class="hidden w-full h-full object-cover rounded-lg">
                                <span id="upload-text-2" class="text-gray-400 text-sm">Foto 2</span>
                            </div>
                            <input type="file" 
                                   name="foto_kunjungan[]" 
                                   id="foto_kunjungan_2" 
                                   class="hidden" 
                                   accept="image/*"
                                   onchange="previewImage(event, 2)" 
                                   required>
                        </div>

                        <!-- Foto 3 -->
                        <div class="relative w-full aspect-square">
                            <div class="relative w-full h-full border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:border-blue-500 transition-all duration-200 flex items-center justify-center"
                                onclick="document.getElementById('foto_kunjungan_3').click()">
                                <img id="preview-image-3" src="#" alt="Preview Foto" class="hidden w-full h-full object-cover rounded-lg">
                                <span id="upload-text-3" class="text-gray-400 text-sm">Foto 3</span>
                            </div>
                            <input type="file" 
                                   name="foto_kunjungan[]" 
                                   id="foto_kunjungan_3" 
                                   class="hidden" 
                                   accept="image/*"
                                   onchange="previewImage(event, 3)" 
                                   required>
                        </div>
                    </div>
                    <p class="mt-1 text-sm text-gray-500 text-center">Format: JPG, JPEG, PNG (Max. 2MB)</p>
                    @error('foto_kunjungan')
                        <p class="mt-1 text-sm text-red-500 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="md:col-span-2">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                        Status
                    </label>
                    <select name="status" 
                            id="status" 
                            class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror"
                            required>
                        <option value="">Pilih Status</option>
                        <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="negoisasi" {{ old('status') == 'negoisasi' ? 'selected' : '' }}>Negoisasi</option>
                        <option value="gagal" {{ old('status') == 'gagal' ? 'selected' : '' }}>Gagal</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-100">
                <button type="button" 
                        onclick="window.location='{{ route('kunjungan.index') }}'"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Simpan Kunjungan</span>
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
</script>

@endsection