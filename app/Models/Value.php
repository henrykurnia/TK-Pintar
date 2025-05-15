<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $table = 'value'; // Nama tabel di database

    protected $fillable = [
        'id',
        'student_id', 
        'course_id', 
        'value', 
        'information', 
    ];

    // Relasi ke model Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Value.php
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

}
