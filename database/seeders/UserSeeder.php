<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->delete(); // Clear existing users

        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1'); // Reset auto-increment

        DB::table('users')->insert([
            // Admin account
            [
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Main teacher account
            [
                'email' => 'guru@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'teacher',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Additional teacher account 1
            [
                'email' => 'guru1@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'teacher',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Additional teacher account 2
            [
                'email' => 'guru2@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'teacher',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Additional teacher account 3
            [
                'email' => 'guru3@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'teacher',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Additional teacher account 3
            [
                'email' => 'parent@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'parent',
                'created_at' => now(),
                'updated_at' => now()
            ]

            
        ]);
    }
}