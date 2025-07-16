<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    protected $table = 'profil_desa';
    protected $guarded = [];
    protected $casts = [
        'statistik' => 'array',
        'mutasi' => 'array',
        'batas' => 'array',
    ];

    public function sarana()
    {
        return $this->hasOne(SaranaDesa::class);
    }

    // SaranaDesa.php
    public function profil()
    {
        return $this->belongsTo(ProfilDesa::class, 'profil_desa_id');
    }
}
