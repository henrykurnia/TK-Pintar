<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

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

    /**
     * Get the user that created the announcement
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The classes that belong to the announcement
     */
    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'announcement_class', 'announcement_id', 'class_id');
    }
}