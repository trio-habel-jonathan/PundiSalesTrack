@extends('layouts.app')

@section('content')
@section('title', 'Kelola Jadwal')
<div class="container mx-auto p-6">
    <!-- Header with Date Filter and Actions -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Kelola Jadwal</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola jadwal dalam satu tampilan</p>
        </div>
        
        <div class="flex items-center space-x-4">
            <form method="GET" action="{{ route('sales.jadwal.index') }}" class="flex items-center space-x-3">
                <!-- Date Filters -->
                <div class="flex items-center space-x-2">
                    <div>
                        <input type="date" 
                               name="tanggal_mulai" 
                               value="{{ request('tanggal_mulai') }}" 
                               class="px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                               placeholder="Tanggal Mulai">
                    </div>
                    <span class="text-gray-500">s/d</span>
                    <div>
                        <input type="date" 
                               name="tanggal_selesai" 
                               value="{{ request('tanggal_selesai') }}" 
                               class="px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                               placeholder="Tanggal Selesai">
                    </div>
                </div>
                
                <button type="submit" 
                        class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    <span>Filter</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Jadwal Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($jadwal as $item)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <!-- Google Maps Section -->
            <div class="bg-gray-50 p-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800  flex items-center   ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Lokasi Kunjungan
                </h2>
              
            </div>

            <!-- Jadwal Information Section -->
            <div class="p-6 space-y-4">
                <!-- Tim Sales Information -->
                <div class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Tim Sales</label>
                        <p class="text-lg font-medium text-gray-900">{{ $item->tim_sales->nama_tim_sales }}</p>
                    </div>
                </div>

                <!-- Lokasi Information -->
                <div class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Tempat Lokasi</label>
                        <p class="text-gray-900">{{ $item->lokasi->alamat }}</p>
                        <p class="text-gray-500 text-sm">{{ $item->lokasi->latitude }}, {{ $item->lokasi->longitude }}</p>
                    </div>
                </div>

                <!-- Tanggal Kunjungan -->
                <div class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Tanggal Kunjungan</label>
                        <p class="text-gray-900">{{ $item->tanggal_kunjungan }}</p>
                    </div>
                </div>
                
                <!-- Status -->
                <div class="pt-4 border-t">
                    <span class="px-4 py-2 rounded-full text-sm font-medium 
                        @if ($item->status == 'selesai') bg-green-100 text-green-800 
                        @elseif ($item->status == 'pending') bg-yellow-100 text-yellow-800 
                        @elseif ($item->status == 'dibatalkan') bg-red-100 text-red-800 
                        @else bg-gray-100 text-gray-800 
                        @endif">
                        Status: {{ ucfirst($item->status) }}
                    </span>
                </div>

                <!-- Actions -->
                <div class="pt-4 flex justify-end">
                    <a href="#" 
                       onclick="validateLocationAndRedirect('{{ $item->id_jadwal }}')" 
                       class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-900 transition-colors duration-200 flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span>Kerjakan Tugas</span>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white rounded-xl shadow-md p-8 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-gray-500 text-lg">Tidak ada Jadwal yang ditemukan.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $jadwal->links() }}
    </div>
</div>

<script>
function validateLocationAndRedirect(jadwalId) {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const data = {
                user_latitude: position.coords.latitude,
                user_longitude: position.coords.longitude,
                jadwal: jadwalId
            };

            fetch("{{ route('sales.kunjungan.validate.location') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.status === "success") {
                    // Redirect to create page if validation is successful
                    window.location.href = "{{ route('sales.kunjungan.create') }}?jadwal=" + jadwalId;
                } else {
                    alert(result.message);
                }
            });
        }, function(error) {
            alert("Gagal mendapatkan lokasi. Pastikan GPS aktif dan browser mengizinkan akses lokasi.");
        });
    } else {
        alert("Geolocation tidak didukung oleh browser ini.");
    }
}
</script>
@endsection