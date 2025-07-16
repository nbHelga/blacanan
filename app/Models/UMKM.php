<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    protected $table = 'umkms';
    protected $fillable = ['nama', 'kategori', 'deskripsi', 'gambar', 'status'];
}
