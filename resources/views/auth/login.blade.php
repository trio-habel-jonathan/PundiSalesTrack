@extends('layouts.auth')

@section('content')
<style>
    .hero-gradient {
        background: linear-gradient(135deg, #EEF2FF 0%, #E0E7FF 30%, #DBEAFE 70%, #EFF6FF 100%);
    }

</style>

<div class="min-h-screen hero-gradient flex items-center justify-center px-4 sm:px-6 lg:px-8 relative overflow-hidden">
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
    
    <!-- Decorative Elements -->
    <div class="absolute right-0 top-1/2 transform translate-x-1/2 -translate-y-1/4 opacity-20">
        <div class="w-48 h-48 bg-blue-400 rounded-full filter blur-xl"></div>
    </div>
    <div class="absolute left-0 bottom-0 transform -translate-x-1/2 translate-y-1/2 opacity-20">
        <div class="w-32 h-32 bg-indigo-400 rounded-full filter blur-xl"></div>
    </div>

    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg border border-gray-100 z-10">
        <div>
            <h2 class="text-center text-3xl font-extrabold">
                <span>Sign in to your account</span>
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Or 
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-black">
                    create a new account
                </a>
            </p>
        </div>
        
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-400 p-4">
                <div class="flex">
                    <div class="ml-3">
                        <p class="text-sm text-green-700">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-50 border-l-4 border-red-400 p-4">
                <div class="flex">
                    <div class="ml-3">
                        <p class="text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="rounded-md -space-y-px">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required 
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                        placeholder="Email address">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required 
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                        placeholder="Password">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember_me" type="checkbox" 
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                        Remember me
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" 
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black transition duration-150 ease-in-out">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Sign in
                </button>
            </div>
        </form>
    </div>
</div>
@endsection