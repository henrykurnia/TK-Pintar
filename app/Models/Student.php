<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'class_id',
        'name',
        'number',
        'gender',
        'ttl',
        'religion'
    ];

    public function parent()
    {
        return $this->belongsTo(Parents::class, 'parent_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}