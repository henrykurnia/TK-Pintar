<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teacher_landing';

    protected $fillable = [
        'name',
        'nip',
        'ni_ppk',
        'ttl',
        'address',
        'phone_number',
        'position',
        'photo_path'
    ];
}