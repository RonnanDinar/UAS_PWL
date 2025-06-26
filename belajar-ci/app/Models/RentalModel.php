<?php

namespace App\Models;

use CodeIgniter\Model;

class RentalModel extends Model
{
    protected $table = 'rental';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mobil_id', 'nama_penyewa', 'tanggal_sewa', 'tanggal_kembali', 'status'];
    public $timestamps = false;
}
