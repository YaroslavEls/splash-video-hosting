<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class SeriasSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 20; $i++) { 
            $this->db->table('Serias')->insert($this->generate());
        }
    }

    private function generate(): array
    {
        $faker = Factory::create();
        return [
            'number' => $faker->numberBetween(1, 12),
            'link' => $faker->filePath,
			'title_id' => $faker->numberBetween(1, 20),
        ];
    }
}
