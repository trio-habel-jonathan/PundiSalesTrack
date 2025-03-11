<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KunjunganRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Pastikan ini true agar request bisa digunakan
    }

    public function rules()
    {
        return [
            'id_klien' => 'required|exists:klien,id_klien',
            'id_produk' => 'required|exists:produk,id_produk',
            'id_profile_sales' => 'required|exists:profil_sales,id_profile_sales',
            'id_jadwal' => 'required|exists:jadwal,id_jadwal',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after_or_equal:waktu_mulai',
            'deskripsi_aktivitas' => 'required|string',
            'status' => 'required|string',
            'foto_kunjungan.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
