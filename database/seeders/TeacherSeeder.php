<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Str;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua user dengan role teacher
        $teacherUsers = User::where('role', 'teacher')->get();

        if ($teacherUsers->isEmpty()) {
            $this->command->warn('Tidak ada user dengan role "teacher". Harap tambahkan user dengan role "teacher" terlebih dahulu.');
            return;
        }

        foreach ($teacherUsers as $user) {
            Teacher::create([
                'user_id' => $user->id,
                'name' => $user->name ?? 'Guru ' . Str::random(5),
                'nip' => fake()->numerify('1980######0001'),
                'ttl' => fake()->city() . ', ' . fake()->date('Y-m-d'),
                'address' => fake()->address(),
                'phone_number' => fake()->phoneNumber(),
                'position' => 'Guru Kelas',
                'about_me' => fake()->paragraph(),
            ]);
        }

        $this->command->info('TeacherSeeder berhasil dijalankan.');
    }
}
