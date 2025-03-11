<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Pastikan ini true agar request bisa digunakan
    }

    public function rules()
    {
        return [
            'nama_produk' => 'required|string|max:100',
            'deskripsi_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'foto_produk.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}
