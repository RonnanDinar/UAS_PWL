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
                'merk'       => 'Toyota',
                'nopol'      => 'B 1234 ABC',
                'harga_sewa' => 350000,
                'status'     => 'tersedia',
                'gambar'     => 'avanza.jpeg',
            ],
            [
                'nama_mobil' => 'Xenia',
                'merk'       => 'Daihatsu',
                'nopol'      => 'B 5678 XYZ',
                'harga_sewa' => 330000,
                'status'     => 'tersedia',
                'gambar'     => 'xenia.jpeg',
            ],
            [
                'nama_mobil' => 'Civic Type R',
                'merk'       => 'Honda',
                'nopol'      => 'B 6 XH',
                'harga_sewa' => 6000000,
                'status'     => 'tersedia',
                'gambar'     => 'civic.jpeg',
            ],
        ];

        // Insert data ke tabel mobil
        $this->db->table('mobil')->insertBatch($data);
    }
}
