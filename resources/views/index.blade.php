<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PundiSalesTrack - Sales Monitoring System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #EEF2FF 0%, #E0E7FF 30%, #DBEAFE 70%, #EFF6FF 100%);
        }
        .text-gradient {
            background: linear-gradient(to right, #1E40AF, #3B82F6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-lg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex items-center space-x-2">
                       
                        <span class="text-lg font-bold">PundiSalesTrack</span>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 px-4 py-2 rounded-xl hover:bg-gray-50">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Modern Gradient -->
    <main class="pt-16">
        <div class="relative overflow-hidden hero-gradient">
            <div class="max-w-7xl mx-auto">
                <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                    <div class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                            <h1 class="text-4xl tracking-tight font-extrabold sm:text-5xl md:text-6xl">
                                <span class="block">Pantau Tim Sales Anda</span>
                                <span class="block text-gradient">Secara Real-Time</span>
                            </h1>
                            <!-- Decorative Elements -->
                            <div class="absolute right-0 top-1/2 transform translate-x-1/2 -translate 4 opacity-20">
                                <div class="w-48 h-48 bg-blue-400 rounded-full filter blur-xl"></div>
                            </div>
                            <div class="absolute left-0 bottom-0 transform -translate-x-1/2 translate-y-1/2 opacity-20">
                                <div class="w-32 h-32 bg-indigo-400 rounded-full filter blur-xl"></div>
                            </div>
                            <p class="mt-3 text-base text-gray-600 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                Tingkatkan efektivitas tim sales Anda dengan sistem pemantauan yang komprehensif. Lacak kunjungan, jadwal, dan performa tim sales dalam satu platform.
                            </p>
                            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                <div class="rounded-xl">
                                    <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10">
                                        Mulai Sekarang
                                    </a>
                                </div>
                                <div class="mt-3 sm:mt-0 sm:ml-3">
                                    <a href="#features" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-xl text-blue-600 bg-blue-50 hover:bg-blue-100 md:py-4 md:text-lg md:px-10">
                                        Pelajari Lebih Lanjut
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Decorative Background Patterns -->
            <div class="absolute top-0 right-0 transform translate-x-1/3 -translate-y-1/4">
                <svg width="404" height="384" fill="none" viewBox="0 0 404 384" class="opacity-10">
                    <defs>
                        <pattern id="pattern-squares" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" fill="currentColor" class="text-blue-500"/>
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#pattern-squares)"/>
                </svg>
            </div>
        </div>

        <!-- Features Section -->
        <div id="features" class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900">Fitur Unggulan</h2>
                    <p class="mt-4 text-xl text-gray-600">Semua yang Anda butuhkan untuk mengelola tim sales</p>
                </div>

                <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Feature 1 -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Manajemen Jadwal</h3>
                        <p class="mt-2 text-gray-600">Atur dan pantau jadwal kunjungan tim sales dengan mudah. Hindari tumpang tindih jadwal dan optimalkan rute.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Analisis Performa</h3>
                        <p class="mt-2 text-gray-600">Dapatkan insight mendalam tentang kinerja tim sales melalui dashboard analitik yang komprehensif.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Tracking Lokasi</h3>
                        <p class="mt-2 text-gray-600">Pantau lokasi tim sales secara real-time dan pastikan kunjungan sesuai dengan rencana.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="bg-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="text-center">
                        <span class="block text-4xl font-bold text-blue-600">1000+</span>
                        <span class="block mt-1 text-lg text-gray-600">Tim Sales Aktif</span>
                    </div>
                    <div class="text-center">
                        <span class="block text-4xl font-bold text-blue-600">50.000+</span>
                        <span class="block mt-1 text-lg text-gray-600">Kunjungan/Bulan</span>
                    </div>
                    <div class="text-center">
                        <span class="block text-4xl font-bold text-blue-600">98%</span>
                        <span class="block mt-1 text-lg text-gray-600">Tingkat Kepuasan</span>
                    </div>
                    <div class="text-center">
                        <span class="block text-4xl font-bold text-blue-600">25%</span>
                        <span class="block mt-1 text-lg text-gray-600">Peningkatan Efisiensi</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-blue-600">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        Siap untuk meningkatkan performa tim sales Anda?
                    </h2>
                    <p class="mt-4 text-xl text-blue-100">
                        Mulai gunakan PundiSalesTrack sekarang dan rasakan perbedaannya.
                    </p>
                    <div class="mt-8">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-xl text-blue-600 bg-white hover:bg-blue-50 md:py-4 md:text-lg md:px-10">
                            Daftar Gratis
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-white text-lg font-bold mb-4">Produk</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-white">Fitur</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">Harga</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">Tutorial</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-white text-lg font-bold mb-4">Perusahaan</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-white">Tentang Kami</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">Karir</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">Blog</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-white text-lg font-bold mb-4">Dukungan</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-white">Bantuan</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">Kontak</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">FAQ</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-white text-lg font-bold mb-4">Legal</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-white">Privasi</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">Syarat & Ketentuan</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">Kebijakan Cookie</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-8 border-t border-gray-700 pt-8 text-center">
                    <p class="text-gray-400">&copy; 2025 PundiSalesTrack. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </main>
</body>
</html>