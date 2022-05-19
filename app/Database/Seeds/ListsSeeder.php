<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ListsSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 20; $i++) { 
            $this->db->table('Lists')->insert($this->generate());
        }
    }

    private function generate(): array
    {
        $faker = Factory::create();
        return [
            'name' => $faker->word,
            'owner' => $faker->numberBetween(1, 20),
			'public' => $faker->boolean,
        ];
    }
}
