<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TitlesLists extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'title_id'       => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => true,
            ],
            'list_id'       => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => true,
            ],
        ]);
        
        $this->forge->addForeignKey('title_id', 'Titles', 'id');
        $this->forge->addForeignKey('list_id', 'Lists', 'id');
        $this->forge->createTable('TitlesLists');
    }

    public function down()
    {
        $this->forge->dropTable('TitlesLists');
    }
}
