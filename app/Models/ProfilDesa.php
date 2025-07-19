<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    protected $table = 'profil_desa';
    protected $guarded = [];
    protected $casts = [
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

    // Get all statistik data (not just related ones)
    public function getStatistikAttribute()
    {
        return \App\Models\Statistik::orderBy('urutan')->get();
    }

    // Get all mutasi data (not just related ones)
    public function getMutasiAttribute()
    {
        return \App\Models\Mutasi::orderBy('urutan')->get();
    }

    // Relationship to specific statistik record (if needed)
    public function statistikRecord()
    {
        return $this->belongsTo(\App\Models\Statistik::class, 'statistik_id');
    }

    // Relationship to specific mutasi record (if needed)
    public function mutasiRecord()
    {
        return $this->belongsTo(\App\Models\Mutasi::class, 'mutasi_id');
    }
}
