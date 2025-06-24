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
            'merk' => 'Toyota',
            'nopol' => 'B 1234 ABC',
            'harga_sewa' => 350000,
            'status' => 'tersedia',
        ],
        [
            'nama_mobil' => 'Xenia',
            'merk' => 'Daihatsu',
            'nopol' => 'B 5678 XYZ',
            'harga_sewa' => 330000,
            'status' => 'tersedia',
        ],
        [
            'nama_mobil' => 'civic type r',
            'merk' => 'Honda',
            'nopol' => 'B 6 XH',
            'harga_sewa' => 6000000,
            'status' => 'tersedia',
        ]
    ];

    $this->db->table('mobil')->insertBatch($data);
}

}