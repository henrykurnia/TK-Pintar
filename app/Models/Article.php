<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article'; 

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'date'
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at'
    ];

    public function image(): MorphOne
    {
        return $this->morphOne(ImageUrl::class, 'owner');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
