<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'otp',
        'otp_expires_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'otp',
        'otp_expires_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'otp_expires_at' => 'datetime'
    ];

    // Relasi ke Parent
    public function parent()
    {
        return $this->hasOne(ParentModel::class);
    }

    // Relasi ke Teacher
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'parent_id');
    }

    
    // Implementasi metode dari JWTSubject

    /**
     * Mengambil ID pengguna untuk JWT
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        // Mengembalikan ID pengguna
        return $this->getKey();  // ID dari user (biasanya `id`)
    }

    /**
     * Menambahkan klaim kustom untuk token JWT
     * @return array
     */
    public function getJWTCustomClaims()
    {
        // Anda bisa menambahkan klaim kustom jika perlu
        return [];
    }

    /**
     * relasi ImageUrl pp
     */
    public function imageUrls()
    {
        return $this->morphMany(ImageUrl::class, 'owner');
    }
}