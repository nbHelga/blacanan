<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SOD extends Model
{
    protected $table = 'sods';
    protected $fillable = ['nama', 'jabatan', 'deskripsi', 'gambar', 'status'];
}
