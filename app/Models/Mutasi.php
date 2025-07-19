<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = 'mutasi';
    protected $fillable = ['wilayah', 'pindah_laki', 'pindah_perempuan', 'datang_laki', 'datang_perempuan', 'urutan'];
}
