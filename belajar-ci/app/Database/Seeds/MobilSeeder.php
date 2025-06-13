<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MobilSeeder extends Seeder
{
    public function run()
{
    $data = [
        [
            'nama_mobil' => 'Avanza',
            'merek' => 'Toyota',
            'nopol' => 'B 1234 ABC',
            'harga' => 350000,
            'status' => 'tersedia',
        ],
        [
            'nama_mobil' => 'Xenia',
            'merek' => 'Daihatsu',
            'nopol' => 'B 5678 XYZ',
            'harga' => 330000,
            'status' => 'tersedia',
        ]
    ];

    $this->db->table('mobil')->insertBatch($data);
}

}
