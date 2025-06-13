<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
{
    $data = [
        [
            'nama' => 'Admin Rental',
            'email' => 'admin@rental.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role' => 'admin',
        ],
        [
            'nama' => 'User Biasa',
            'email' => 'user@rental.com',
            'password' => password_hash('user123', PASSWORD_DEFAULT),
            'role' => 'user',
        ],
    ];

    $this->db->table('users')->insertBatch($data);
}

}
