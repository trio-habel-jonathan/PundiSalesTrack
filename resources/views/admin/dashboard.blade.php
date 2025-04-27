@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Header with Search and Actions -->
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-semibold">Dashboard Admin</h1>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Sales Card -->
        <div class="bg-white p-6 rounded-xl shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Sales</p>
                    <h3 class="text-2xl font-semibold mt-1">{{ $totalSales }}</h3>
                </div>
                <div class="p-3 bg-blue-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" 
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-500 text-sm font-medium">+12%</span>
                <span class="text-gray-500 text-sm ml-2">from last month</span>
            </div>
        </div>
    </div>
    <!-- Chart Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Kunjungan Status Chart -->
        <div class="bg-white p-3 rounded-xl shadow-sm">
            <canvas id="kunjunganStatusChart" width="250" height="250"></canvas> <!-- Ukuran pie chart 80x80 px -->
        </div>

        <!-- Produk Populer Chart -->
        <div class="bg-white p-3 rounded-xl shadow-sm">
            <canvas id="produkPopulerChart" width="250" height="250"></canvas> <!-- Ukuran bar chart 80x80 px -->
        </div>
    </div>



    <div class="bg-white rounded-xl shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID Kunjungan
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama Klien
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Waktu Mulai
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Waktu Selesai
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($kunjunganTerakhir as $kunjungan)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $kunjungan->id_kunjungan }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $kunjungan->nama_klien }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $kunjungan->waktu_mulai }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $kunjungan->waktu_selesai }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-medium rounded-full 
                                {{ $kunjungan->status == 'dibatalkan' ? 'bg-red-100 text-red-800' : 
                                   ($kunjungan->status == 'terjadwal' ? 'bg-yellow-100 text-yellow-800' : 
                                   'bg-green-100 text-green-800') }}">
                                {{ ucfirst($kunjungan->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx1 = document.getElementById('kunjunganStatusChart').getContext('2d');
    var kunjunganStatusChart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: @json($kunjunganStatus->pluck('status')),
            datasets: [{
                data: @json($kunjunganStatus->pluck('total')),
                backgroundColor: ['#FF5733', '#33FF57', '#3357FF'],
                borderColor: ['#fff', '#fff', '#fff'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,  // Menghindari perubahan aspek rasio default
        }
    });

    var ctx2 = document.getElementById('produkPopulerChart').getContext('2d');
    var produkPopulerChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: @json($produkPopuler->pluck('nama_produk')),
            datasets: [{
                label: 'Produk Populer',
                data: @json($produkPopuler->pluck('total')),
                backgroundColor: '#4CAF50',
                borderColor: '#388E3C',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,  // Menghindari perubahan aspek rasio default
        }
    });
</script>
@endsection
