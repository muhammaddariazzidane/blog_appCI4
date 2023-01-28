<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'title' => 'ksjdijidus web design',
            'body' => 'loreyyysdymdnsndjnsndi',
            'category_id' => 6,
            'user_id' => 6,
        ];


        $this->db->table('posts')->insert($data);
    }
}
