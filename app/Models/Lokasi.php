<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey ='id_lokasi';


    protected $fillable = [
        'alamat',
        'provinsi',
        'kota',
        'longitude',
        'latitude',

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function fotoKunjungan()
{
    return $this->hasMany(FotoKunjungan::class, 'id_kunjungan', 'id_kunjungan');
}
}

