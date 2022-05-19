<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        $this->call('TitlesSeeder');
        $this->call('TagsSeeder');
        $this->call('TitlesTagsSeeder');
        $this->call('SeriasSeeder');
        $this->call('ProfilesSeeder');
        $this->call('FriendsSeeder');
        $this->call('ListsSeeder');
        $this->call('TitlesListsSeeder');
    }
}
