<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TagsSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 20; $i++) { 
            $this->db->table('Tags')->insert($this->generate());
        }
    }

    private function generate(): array
    {
        $faker = Factory::create();
        return [
            'name' => $faker->word,
			'genre' => $faker->boolean,
        ];
    }
}
