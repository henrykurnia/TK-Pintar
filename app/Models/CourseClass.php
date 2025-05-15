<?php
// app/Models/Schedule.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    protected $table = 'course_class';

    protected $fillable = [
        'id',
        'class_id',
        'course_class_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
