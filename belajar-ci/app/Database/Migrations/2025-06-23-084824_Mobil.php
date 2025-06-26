<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mobil extends Migration
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
            'nama_mobil' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'merk' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'nopol' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'harga_sewa' => [
                'type' => 'INT',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'tersedia',
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('mobil');
    }

    public function down()
    {
        $this->forge->dropTable('mobil');
    }
}
