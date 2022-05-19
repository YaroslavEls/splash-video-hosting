<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lists extends Migration
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
            'owner'       => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => true,
            ],
            'public'     => [
                'type'           => 'bool',
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('Lists');
    }

    public function down()
    {
        $this->forge->dropTable('Lists');
    }
}
