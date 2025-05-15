<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan semua seeder di sini
        $this->call([
            UserSeeder::class,
            TeacherSeeder::class,
            ParentsSeeder::class,
            ClassesSeeder::class,
            StudentsSeeder::class,
            CourseSeeder::class,
            // Tambahkan seeder lain jika ada
        ]);
    }
}
