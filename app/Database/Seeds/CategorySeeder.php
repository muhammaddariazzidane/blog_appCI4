<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Personal',
        ];


        $this->db->table('categories')->insert($data);
    }
}
