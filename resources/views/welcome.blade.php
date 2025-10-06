<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistem Inventaris - Kelola Barang Anda dengan Mudah</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50 dark:bg-gray-900">
        <!-- Navigation -->
        <nav class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span class="ml-2 text-xl font-bold text-gray-900 dark:text-white">Inventaris</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium">
                                    Masuk
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                        Daftar
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                        Kelola Inventaris Anda
                        <span class="text-blue-600">dengan Mudah</span>
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-3xl mx-auto">
                        Sistem inventaris modern untuk mengelola barang, kategori, dan stok dengan fitur pencarian canggih,
                        upload gambar, dan laporan otomatis. Sederhana, cepat, dan handal.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-lg font-medium transition-colors">
                                    Buka Dashboard
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-lg font-medium transition-colors">
                                    Mulai Sekarang
                                </a>
                                <a href="{{ route('login') }}" class="border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 px-8 py-3 rounded-lg text-lg font-medium transition-colors">
                                    Masuk
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>

            <!-- Background decoration -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
                <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
                <div class="absolute top-40 right-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
                <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="py-24 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        Fitur Lengkap untuk Pengelolaan Inventaris
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Semua yang Anda butuhkan untuk mengelola inventaris dengan efisien dan akurat
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Manajemen Barang</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Tambah, edit, dan hapus barang dengan mudah. Upload gambar dan kelola detail lengkap setiap item.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl">
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Kategori & Organisasi</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Kelompokkan barang dalam kategori untuk organisasi yang lebih baik dan pencarian yang efisien.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Pencarian Canggih</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Temukan barang dengan cepat menggunakan fitur pencarian real-time berdasarkan nama, kategori, atau deskripsi.
                        </p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl">
                        <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Dashboard Statistik</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Pantau performa inventaris dengan dashboard interaktif dan grafik yang informatif.
                        </p>
                    </div>

                    <!-- Feature 5 -->
                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl">
                        <div class="w-12 h-12 bg-red-100 dark:bg-red-900 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Export Data</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Ekspor data inventaris ke format CSV untuk backup, analisis, atau pelaporan eksternal.
                        </p>
                    </div>

                    <!-- Feature 6 -->
                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl">
                        <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Keamanan Data</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Data Anda aman dengan sistem autentikasi yang kuat dan kontrol akses berbasis peran.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-blue-600 dark:bg-blue-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        Siap Mengelola Inventaris Anda?
                    </h2>
                    <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                        Bergabunglah dengan ribuan pengguna yang telah mempercayai sistem inventaris kami
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-3 rounded-lg text-lg font-medium transition-colors">
                                    Lanjutkan Kerja
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-3 rounded-lg text-lg font-medium transition-colors">
                                    Daftar Gratis
                                </a>
                                <a href="{{ route('login') }}" class="border border-white text-white hover:bg-blue-500 px-8 py-3 rounded-lg text-lg font-medium transition-colors">
                                    Masuk ke Akun
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="text-center">
                    <div class="flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <span class="ml-2 text-xl font-bold">Inventaris</span>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Sistem inventaris modern untuk bisnis Anda
                    </p>
                    <p class="text-sm text-gray-500">
                        © {{ date('Y') }} Sistem Inventaris. Dibuat dengan ❤️ menggunakan Laravel.
                    </p>
                </div>
            </div>
        </footer>

        <style>
            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }
            .animate-blob {
                animation: blob 7s infinite;
            }
            .animation-delay-2000 {
                animation-delay: 2s;
            }
            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
    </body>
</html>
