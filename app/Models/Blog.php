<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = ['kategori', 'judul', 'deskripsi', 'gambar', 'status'];

    public function images()
    {
        return $this->hasMany(BlogImage::class, 'blog_id')->orderBy('urutan');
    }

    // Get first image for display in lists
    public function getFirstImageAttribute()
    {
        $firstImage = $this->images()->first();
        return $firstImage ? $firstImage->gambar : $this->gambar;
    }
}
