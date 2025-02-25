@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Edit Profil Sales</h1>
            <p class="text-sm text-gray-500 mt-1">Perbarui informasi profil sales</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm">
        <form action="{{ route('profil_sales.update', $profil_sales->id_profile_sales) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="foto_profil" class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                    <div class="relative w-40 h-40 mx-auto border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:border-blue-500 transition-all duration-200 flex items-center justify-center" onclick="document.getElementById('foto_profil').click()">
                        <img id="preview-image" src="{{ $profil_sales->foto_profil ? asset('storage/' . $profil_sales->foto_profil) : '#' }}" alt="Preview Foto" class="{{ $profil_sales->foto_profil ? '' : 'hidden' }} w-full h-full object-contain rounded-lg">
                        <span id="upload-text" class="text-gray-400 text-sm {{ $profil_sales->foto_profil ? 'hidden' : '' }}">Klik untuk upload</span>
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

                <div>
                    <label for="id_users" class="block text-sm font-medium text-gray-700 mb-2">Pilih User</label>
                    <select name="id_users" id="id_users" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id_users }}" {{ $profil_sales->id_users == $user->id_users ? 'selected' : '' }}>
                                {{ $user->email }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for="id_tim_sales" class="block text-sm font-medium text-gray-700 mb-2">Tim Sales</label>
                    <select name="id_tim_sales" id="id_tim_sales" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @foreach($timSales as $tim)
                            <option value="{{ $tim->id_tim_sales }}" {{ $profil_sales->id_tim_sales == $tim->id_tim_sales ? 'selected' : '' }}>
                                {{ $tim->nama_tim_sales }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for="id_jabatan" class="block text-sm font-medium text-gray-700 mb-2">Jabatan</label>
                    <select name="id_jabatan" id="id_jabatan" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @foreach($jabatans as $jabatan)
                            <option value="{{ $jabatan->id_jabatan }}" {{ $profil_sales->id_jabatan == $jabatan->id_jabatan ? 'selected' : '' }}>
                                {{ $jabatan->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                    <input type="text" name="nama" id="nama" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan nama" value="{{ old('nama', $profil_sales->nama) }}" required maxlength="100">
                </div>
                
                <div>
                    <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" id="nomor_telepon" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan nomor telepon" value="{{ old('nomor_telepon', $profil_sales->nomor_telepon) }}" required maxlength="20">
                </div>
                
                <div class="md:col-span-2">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                    <textarea name="alamat" id="alamat" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan alamat" required maxlength="255">{{ old('alamat', $profil_sales->alamat) }}</textarea>
                </div>
            </div>
            
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-100">
                <button type="button" onclick="window.location='{{ route('profil_sales.index') }}'" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Batal</button>
                <button type="submit" 
                class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Perbarui Profil Sales</span>
        </button>
            </div>
        </form>
    </div>
</div>
@endsection