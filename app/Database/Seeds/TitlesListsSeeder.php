<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TitlesListsSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 20; $i++) { 
            $this->db->table('TitlesLists')->insert($this->generate());
        }
    }

    private function generate(): array
    {
        $faker = Factory::create();
        return [
            'title_id' => $faker->numberBetween(1, 20),
			'list_id' => $faker->numberBetween(1, 20),
        ];
    }
}
