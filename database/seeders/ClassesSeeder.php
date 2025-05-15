<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classes;
use App\Models\Teacher;

class ClassesSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua guru dari tabel teachers
        $teachers = Teacher::all();

        if ($teachers->isEmpty()) {
            $this->command->warn('Tidak ada data di tabel teachers. Jalankan seeder TeacherSeeder terlebih dahulu.');
            return;
        }

        $kelasList = ['A1', 'A2', 'B1', 'B2'];

        foreach ($kelasList as $kelasName) {
            Classes::create([
                'name' => $kelasName,
                'teacher_id' => $teachers->random()->id, // gunakan ID dari tabel teachers
            ]);
        }

        $this->command->info('Seeder Classes berhasil dijalankan.');
    }
}
