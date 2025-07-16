<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakUMKM extends Model
{
    protected $table = 'kontak_umkms';
    protected $fillable = ['umkm_id', 'logo', 'jenis', 'link'];
    public function umkm()
    {
        return $this->belongsTo(UMKM::class);
    }
}
