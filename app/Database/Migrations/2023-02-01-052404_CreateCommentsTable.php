<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'post_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'value' => [
                'type'  => 'VARCHAR',
                'constraint'  => 255
            ],
            'created_at' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'updated_at' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('comments');
    }
    public function down()
    {
        $this->forge->dropTable('comments');
    }
}
