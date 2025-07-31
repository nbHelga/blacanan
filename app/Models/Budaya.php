<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budaya extends Model
{
    protected $table = 'budayas';
    protected $fillable = ['nama', 'kategori', 'deskripsi', 'gambar', 'status'];
}
