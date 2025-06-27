<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyewa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'mobil_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'tanggal_sewa' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'tanggal_kembali' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['diproses', 'disewa', 'selesai'],
                'default'    => 'disewa',
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('rental');
    }

    public function down()
    {
        $this->forge->dropTable('rental');
    }
}
