<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Config\Database;
use App\Models\MobilModel;
use App\Models\RentalModel;
use App\Models\UserModel;

class ApiController extends ResourceController
{
    protected $db;
    protected $apiKey;
    protected $mobil;
    protected $rental;
    protected $user;

    public function __construct()
    {
        $this->db     = Database::connect();
        $this->apiKey = env('API_KEY');
        $this->mobil  = new MobilModel();
        $this->rental = new RentalModel();
        $this->user   = new UserModel();
    }

    // GET /api/rental
    public function index()
    {
        // Ambil API Key dari header request
        $clientKey = $this->request->getHeaderLine('X-API-KEY');

        // Cek apakah cocok
        if ($clientKey !== $this->apiKey) {
            return $this->failUnauthorized('API Key tidak valid.');
        }

        // Jika valid, ambil data
        $query = $this->db->table('rental')
            ->select('users.nama AS nama_user, mobil.nama_mobil, mobil.merk, rental.tanggal_sewa, rental.tanggal_kembali, rental.status')
            ->join('users', 'users.id = rental.user_id')
            ->join('mobil', 'mobil.id = rental.mobil_id')
            ->get();

        $data = $query->getResultArray();

        return $this->respond($data, 200);
    }
}
