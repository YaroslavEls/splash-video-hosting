<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comments extends Migration
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
            'text'     => [
                'type'           => 'VARCHAR',
            ],
            'user_id'       => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => true,
            ],
            'title_id'     => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'Profiles', 'id');
        $this->forge->addForeignKey('title_id', 'Titles', 'id');
        $this->forge->createTable('Comments');
    }

    public function down()
    {
        $this->forge->dropTable('Comments');
    }
}
