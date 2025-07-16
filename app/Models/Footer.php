<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = 'footer';
    protected $guarded = [];
    public function kontak()
    {
        return $this->hasMany(FooterKontak::class, 'footer_id');
    }
}
