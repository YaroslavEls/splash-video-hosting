<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TitlesSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 20; $i++) { 
            $this->db->table('Titles')->insert($this->generate());
        }
    }

    private function generate(): array
    {
        $faker = Factory::create();
        return [
            'name' => $faker->sentence(3),
			'desc' => $faker->sentence(50),
			'rating' => $faker->numberBetween(0, 10),
			'image' => $faker->filePath,
            'episodes' => $faker->numberBetween(1, 12),
        ];
    }
}
