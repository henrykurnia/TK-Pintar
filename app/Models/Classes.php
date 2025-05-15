<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = ['id, name', 'teacher_id'];

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function courseClasses()
    {
        return $this->hasMany(CourseClass::class, 'class_id');
    }

    public function announcements()
    {
        return $this->belongsToMany(Announcement::class, 'announcement_class', 'class_id', 'announcement_id');
    }
}
