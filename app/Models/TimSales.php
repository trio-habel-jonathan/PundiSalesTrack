<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimSales extends Model
{
    protected $table = 'tim_sales';
    protected $primaryKey = 'id_tim_sales';

    protected $fillable = [
        'nama_tim_sales',
        
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id_users');
    }


    public function members()
    {
        return $this->hasMany(ProfilSales::class, 'id_tim_sales');
    }

};
