<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ProfilSales extends Model
{
    protected $table = 'profil_sales';
    protected $primaryKey = 'id_profile_sales';

    protected $fillable = [
        'id_users',
        'id_tim_sales',
        'id_jabatan',
        'foto_profil',
        'nama',
        'alamat',
        'nomor_telepon',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users', 'id_users');
    }

    public function tim_sales()
    {
        return $this->belongsTo(TimSales::class, 'id_tim_sales', 'id_tim_sales');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }
}
