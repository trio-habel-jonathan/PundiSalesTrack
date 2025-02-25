@extends('layouts.app')

@section('content')
@section('title', 'Buat Tim Sales')

<div class="container mx-auto p-6">
    <!-- Header with Back and Actions -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold">Buat Tim Sales</h1>
            <p class="text-sm text-gray-500 mt-1">Tambahkan Tim Sales Baru Dalam Sistem</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm">
        <form action="{{ route('tim_sales.store') }}" method="POST" class="p-6">
            @csrf
            
            <div class="grid grid-cols-1 gap-6">
                <!-- Team Name Field -->
                <div>
                    <label for="nama_tim_sales" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Tim
                    </label>
                    <input type="text" 
                           name="nama_tim_sales" 
                           id="nama_tim_sales_sales" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Masukkan nama tim yang diiinginkan"
                           value="{{ old('nama_tim_sales') }}"
                           required>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-100">
                <button type="button" 
                        onclick="window.location='{{ route('tim_sales.index') }}'"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors duration-200">
                    Cancel
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-black text-white rounded-lg flex items-center space-x-2 hover:bg-gray-900 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Buat Tim</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
