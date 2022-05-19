<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tags extends Migration
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
            'genre'     => [
                'type'           => 'bool',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Tags');
    }

    public function down()
    {
        $this->forge->dropTable('Tags');
    }
}
