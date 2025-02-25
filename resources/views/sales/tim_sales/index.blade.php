@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tim Sales Anda</h1>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold">{{ $tim->nama_tim_sales }}</h2>
        <p class="text-gray-600 mt-2">Anggota Tim:</p>
        @if($tim->members->isEmpty())
            <p class="mt-4 text-gray-500">Belum ada anggota tim.</p>
        @else
            <ul class="mt-4">
                @foreach($tim->members as $member)
                    <li class="border-b py-2">
                        {{ $member->nama }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
