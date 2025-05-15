<?php
// app/Models/Schedule.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'course_class_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    // Relasi dengan course_class
    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class);
    }
}
