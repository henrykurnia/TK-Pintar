<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'image_path',
        'image_url' // Tambahkan ini
    ];

    // Jika ingin selalu menyertakan image_url dalam output
    protected $appends = ['image_url'];

    // Accessor untuk image_url
    public function getImageUrlAttribute()
    {
        return asset($this->image_path);
    }
}