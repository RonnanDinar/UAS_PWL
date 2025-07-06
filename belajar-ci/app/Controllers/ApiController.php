<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Config\Database;

class ApiController extends ResourceController
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // GET /api/rental
    public function index()
    {
          $query = $this->db->table('rental')
            ->select('users.nama AS nama_user, mobil.nama_mobil, mobil.merk, rental.tanggal_sewa, rental.tanggal_kembali, rental.status')
            ->join('users', 'users.id = rental.user_id')
            ->join('mobil', 'mobil.id = rental.mobil_id')
            ->get();

        $data = $query->getResultArray();

        return $this->respond($data, 200);
    }
}
