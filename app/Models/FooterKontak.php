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

    // Extract display name from URL
    public function getDisplayNameAttribute()
    {
        if (filter_var($this->value, FILTER_VALIDATE_URL)) {
            // Extract username/handle from social media URLs
            if (strpos($this->value, 'twitter.com') !== false || strpos($this->value, 'x.com') !== false) {
                preg_match('/(?:twitter\.com|x\.com)\/([^\/\?]+)/', $this->value, $matches);
                return isset($matches[1]) ? '@' . $matches[1] : $this->value;
            }
            if (strpos($this->value, 'facebook.com') !== false) {
                preg_match('/facebook\.com\/([^\/\?]+)/', $this->value, $matches);
                return isset($matches[1]) ? $matches[1] : $this->value;
            }
            if (strpos($this->value, 'instagram.com') !== false) {
                preg_match('/instagram\.com\/([^\/\?]+)/', $this->value, $matches);
                return isset($matches[1]) ? '@' . $matches[1] : $this->value;
            }
            // For other URLs, return the value
            return $this->value;
        }

        // For non-URLs (like email, phone), return the value
        return $this->value;
    }
}
