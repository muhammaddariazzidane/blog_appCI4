<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'zidane',
            'email' => 'z@gmail.com',
            'password' => 'nnnnn'
        ];
        // $data['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);


        $this->db->table('users')->insert($data);
    }
}
