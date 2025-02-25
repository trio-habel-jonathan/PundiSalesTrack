<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoKunjungan extends Model
{
    protected $table = 'foto_kunjungan';
    protected $primaryKey = 'id_foto_kunjungan';

    protected $fillable = [
        'id_kunjungan',
        'foto',
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
