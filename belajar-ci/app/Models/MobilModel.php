<?php

namespace App\Models;

use CodeIgniter\Model;

class MobilModel extends Model
{
    protected $table      = 'mobil';         // Nama tabel di database
    protected $primaryKey = 'id';            // Primary key

    protected $returnType     = 'array';     // Kembalikan dalam bentuk array
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama_mobil', 'merk', 'nopol' , 'harga_sewa', 'status' , 'gambar'];

}
