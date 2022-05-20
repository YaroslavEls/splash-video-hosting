<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Serias extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'number'     => [
                'type'           => 'INT',
                'constraint'     => 3,
                'unsigned'       => true,
            ],
            'link'     => [
                'type'           => 'VARCHAR',
            ],
            'title_id'       => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => true,
            ],
        ]);

        $this->forge->addForeignKey('title_id', 'Titles', 'id');
        $this->forge->createTable('Serias');
    }

    public function down()
    {
        $this->forge->dropTable('Serias');
    }
}
