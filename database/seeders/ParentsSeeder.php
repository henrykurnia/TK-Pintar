<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ParentModel;
use App\Models\User;
use Illuminate\Support\Str;

class ParentsSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua user dengan role 'parent'
        $parentUsers = User::where('role', 'parent')->get();

        if ($parentUsers->isEmpty()) {
            $this->command->warn('Tidak ada user dengan role "parent". Harap tambahkan user dengan role "parent" terlebih dahulu.');
            return;
        }

        foreach ($parentUsers as $user) {
            ParentModel::create([
                'user_id' => $user->id,
                'name' => $user->name ?? 'Orang Tua ' . Str::random(5),
                'education' => fake()->randomElement(['SMA', 'D3', 'S1', 'S2']),
                'work' => fake()->jobTitle(),
                'phone_number' => fake()->phoneNumber(),
                'address' => fake()->address(),
            ]);
        }

        $this->command->info('ParentSeeder berhasil dijalankan.');
    }
}
