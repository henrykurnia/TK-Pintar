<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageUrl extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'url',
        'jenis',
        'owner_id',
        'owner_type'
    ];

    public function owner()
    {
        return $this->morphTo();
    }
}