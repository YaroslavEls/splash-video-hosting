<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Friends extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'profile1_id'       => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => true,
            ],
            'profile2_id'     => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => true,
            ],
            'pending'         => [
                'type'          => 'bool',
            ],
        ]);
        
        $this->forge->addForeignKey('profile1_id', 'Profiles', 'id');
        $this->forge->addForeignKey('profile2_id', 'Profiles', 'id');
        $this->forge->createTable('Friends');
    }

    public function down()
    {
        $this->forge->dropTable('Friends');
    }
}
