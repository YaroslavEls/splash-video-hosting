<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Titles extends Migration
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
            'name'     => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'desc'     => [
                'type'           => 'VARCHAR',
                'constraint'     => 55,
            ],
            'rating'   => [
                'type'          => 'float4',
            ],
            'image'     => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'episodes' => [
                'type'          => 'int',
                'constraint'    => 255,
                'unsigned'      => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('Titles');
    }

    public function down()
    {
        $this->forge->dropTable('Titles');
    }
}
