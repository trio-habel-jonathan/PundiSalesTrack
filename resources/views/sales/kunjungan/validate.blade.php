@extends('layouts.app')

@section('title', 'Validasi Lokasi')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Validasi Lokasi</h1>
    <p class="mb-4">Silakan izinkan akses lokasi untuk validasi kunjungan.</p>
    <button id="validate-btn" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Validasi Lokasi</button>
    @if(session('error'))
        <p class="mt-4 text-red-500">{{ session('error') }}</p>
    @endif
</div>

<script>
document.getElementById('validate-btn').addEventListener('click', function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const data = {
                user_latitude: position.coords.latitude,
                user_longitude: position.coords.longitude,
                jadwal: "{{ $jadwalId }}"
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
                    // Redirect ke halaman create jika validasi sukses
                    window.location.href = "{{ route('sales.kunjungan.create') }}?jadwal={{ $jadwalId }}";
                } else {
                    alert(result.message);
                }
            });
        }, function(error) {
            alert("Gagal mendapatkan lokasi. Pastikan GPS aktif dan browser mengizinkan akses lokasi.");
        })
    } else {
        alert("Geolocation tidak didukung oleh browser ini.");
    }
});
</script>
@endsection
