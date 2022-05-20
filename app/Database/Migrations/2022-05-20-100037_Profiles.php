<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profiles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'       => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'     => [
                'type'           => 'VARCHAR',
            ],
            'email'     => [
                'type'           => 'VARCHAR',
            ],
            'password'     => [
                'type'           => 'VARCHAR',
            ],
            'image'     => [
                'type'           => 'VARCHAR',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('Profiles');
    }

    public function down()
    {
        $this->forge->dropTable('Profiles');
    }
}
