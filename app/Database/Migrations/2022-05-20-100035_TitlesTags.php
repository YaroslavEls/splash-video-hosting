<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TitlesTags extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'title_id'       => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => true,
            ],
            'tag_id'     => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => true,
            ],
        ]);
        
        $this->forge->addForeignKey('title_id', 'Titles', 'id');
        $this->forge->addForeignKey('tag_id', 'Tags', 'id');
        $this->forge->createTable('TitlesTags');
    }

    public function down()
    {
        $this->forge->dropTable('TitlesTags');
    }
}
