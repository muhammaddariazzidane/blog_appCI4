<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PostSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'title' => 'ksjdijidus web design',
            'body' => 'loreyyysdymdnsndjnsndi',
            'category_id' => 1,
            'user_id' => 1,
            // 'created_at' => Time::now()
        ];


        $this->db->table('posts')->insert($data);
    }
}
