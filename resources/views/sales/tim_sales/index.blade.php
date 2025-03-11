@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Tim Sales Anda</h1>
        <p class="text-gray-500 mt-2">Detail tim sales tempat Anda tergabung.</p>
    </div>

    @if ($profil->tim_sales)
        <!-- Card Tim Sales -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header Tim -->
            <div class="bg-gradient-to-r from-gray-100 to-gray-50 p-6 border-b">
                <h2 class="text-2xl font-semibold text-gray-800">{{ $profil->tim_sales->nama_tim_sales }}</h2>
                <p class="text-gray-500 mt-1">Daftar anggota tim:</p>
            </div>

            <!-- List Anggota Tim -->
            <div class="p-6">
                @if($profil->tim_sales->members->isEmpty())
                    <!-- Jika Tidak Ada Anggota -->
                    <div class="text-center py-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 8a9 9 0 110-18 9 9 0 010 18z" />
                        </svg>
                        <p class="text-gray-500 text-lg">Belum ada anggota lain di tim ini.</p>
                    </div>
                @else
                    <!-- Grid Layout untuk List Anggota -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($profil->tim_sales->members as $member)
                            <div class="bg-white border rounded-lg shadow-md p-4 flex items-center space-x-4">
                                <!-- Foto Profil -->
                                <div class="w-14 h-14 flex-shrink-0 rounded-full overflow-hidden bg-gray-200">
                                    @if($member->foto_profil)
                                        <img src="{{ asset('storage/' . $member->foto_profil) }}" 
                                             alt="Foto {{ $member->nama }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                      
                                        <div class="flex items-center justify-center w-full h-full bg-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <!-- Detail Anggota -->
                                <div>
                                    <p class="text-lg font-medium text-gray-900">{{ $member->nama }}</p>
                                    <p class="text-sm text-gray-500">{{ $member->jabatan->nama_jabatan ?? 'Tidak Tersedia' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @else
        <!-- Jika Sales Belum Memiliki Tim Sales -->
        <div class="bg-white rounded-xl shadow-md p-8 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <p class="text-gray-500 text-lg mb-4">Anda belum memiliki tim sales.</p>

           
           
        </div>
    @endif
</div>
@endsection
