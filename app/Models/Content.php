<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';
    protected $fillable = ['judul', 'deskripsi', 'tipe', 'video', 'status'];
}
