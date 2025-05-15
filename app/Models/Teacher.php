<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'nip',
        'ttl',
        'address',
        'phone_number',
        'position',
        'about_me'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
{
    return $this->morphOne(ImageUrl::class, 'owner');
}

}
