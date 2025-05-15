<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments'; // Nama tabel di database

    protected $fillable = [
        'id',
        'student_id', // ID siswa
        'month', // Bulan pembayaran
        'year', // Tahun pembayaran
        'status', // Status pembayaran (lunas/belum lunas)
        'date', // Tanggal pembayaran, jika ada
    ];

    // Relasi ke model Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
