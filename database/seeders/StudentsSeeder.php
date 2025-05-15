<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\ParentModel;
use App\Models\Classes;
use Faker\Factory as Faker;

class StudentsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $parents = ParentModel::all();
        $classes = Classes::all();

        if ($parents->isEmpty() || $classes->isEmpty()) {
            $this->command->warn('Seeder dihentikan: Pastikan ada data pada tabel parents dan classes terlebih dahulu.');
            return;
        }

        foreach (range(1, 20) as $i) {
            // Pilih gender terlebih dahulu
            $gender = $faker->randomElement(['Laki-laki', 'Perempuan']);
            // Gunakan gender untuk nama yang sesuai
            $name = $faker->name($gender === 'Laki-laki' ? 'male' : 'female');

            Student::create([
                'parent_id' => $parents->random()->id,
                'class_id' => $classes->random()->id,
                'name' => $name,
                'number' => str_pad($i, 2, '0', STR_PAD_LEFT),
                'gender' => $gender,
                'ttl' => $faker->city . ', ' . $faker->date('d-m-Y', now()->subYears(rand(5, 7))->timestamp),
                'religion' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha'][rand(0, 4)],
            ]);
        }
    }
}
