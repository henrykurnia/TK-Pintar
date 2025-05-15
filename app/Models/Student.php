<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'id',
        'parent_id',
        'class_id',
        'name',
        'number',
        'gender',
        'ttl',
        'religion'
    ];

    public function image()
    {
        return $this->morphOne(ImageUrl::class, 'owner');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function parent()
{
    return $this->belongsTo(ParentModel::class, 'parent_id');
}


    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }




}
