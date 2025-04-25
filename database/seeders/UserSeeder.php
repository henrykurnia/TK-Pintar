<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->delete(); // Aman walau ada foreign key

        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1'); // Opsional reset ID

        DB::table('users')->insert([
            [
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ],
            [
                'email' => 'guru@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'guru',
            ],
        ]);
    }
}
