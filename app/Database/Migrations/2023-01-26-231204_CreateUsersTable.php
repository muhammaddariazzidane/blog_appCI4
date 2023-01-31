<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
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
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 128,
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'user_image' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'is_admin' => [
                'type'           => 'BOOLEAN',
                'default'        => false
            ],
            'created_at' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'updated_at' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
        $this->forge->dropTable('users');
    }
}
