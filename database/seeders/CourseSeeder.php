<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Teacher;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua guru dari tabel teachers
        $teachers = Teacher::all();

        if ($teachers->isEmpty()) {
            $this->command->warn('Tidak ada data guru. Harap isi data pada tabel teachers terlebih dahulu.');
            return;
        }

        // Daftar nama pelajaran
        $courses = [
            'Bahasa Indonesia',
            'Matematika',
            'Ilmu Pengetahuan Alam',
            'Pendidikan Jasmani',
            'Bahasa Inggris',
            'Seni Budaya',
            'Agama'
        ];

        foreach ($courses as $courseName) {
            Course::create([
                'name' => $courseName,
                'teacher_id' => $teachers->random()->id, // Assign random teacher
            ]);
        }

        $this->command->info('CourseSeeder berhasil dijalankan.');
    }
}
