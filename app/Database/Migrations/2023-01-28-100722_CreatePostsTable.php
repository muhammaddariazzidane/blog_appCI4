<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class CreatePostsTable extends Migration
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
            'title' => [
                'type'           => 'VARCHAR',
                'constraint' => 255
            ],
            'body' => [
                'type'           => 'TEXT',
                // 'constraint' => 255
            ],
            'image' => [
                'type'           => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint'     => 11,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint'     => 11,
            ],
            // ganti semua di bawah bukan INT tapi DATETIME jika pakai datetime manual
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
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
