<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMobilTable extends Migration
{
   public function up()
{
    $this->forge->addField([
        'id' => ['type' => 'INT', 'auto_increment' => true],
        'nama_mobil' => ['type' => 'VARCHAR', 'constraint' => 100],
        'merek' => ['type' => 'VARCHAR', 'constraint' => 100],
        'nopol' => ['type' => 'VARCHAR', 'constraint' => 20],
        'harga' => ['type' => 'INT'],
        'status' => ['type' => 'ENUM', 'constraint' => ['tersedia', 'dipinjam'], 'default' => 'tersedia'],
        'created_at' => ['type' => 'DATETIME', 'null' => true],
        'updated_at' => ['type' => 'DATETIME', 'null' => true],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('mobil');
}

}
