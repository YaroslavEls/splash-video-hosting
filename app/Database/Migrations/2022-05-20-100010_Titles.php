<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Qwe extends Migration
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
            ],
            'desc'     => [
                'type'           => 'VARCHAR',
            ],
            'rating'   => [
                'type'          => 'float4',
            ],
            'image'     => [
                'type'          => 'VARCHAR',
            ],
            'episodes' => [
                'type'          => 'INT',
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
