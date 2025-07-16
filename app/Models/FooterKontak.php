<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterKontak extends Model
{
    protected $table = 'footer_kontak';
    protected $guarded = [];
    public function footer()
    {
        return $this->belongsTo(Footer::class, 'footer_id');
    }
}
