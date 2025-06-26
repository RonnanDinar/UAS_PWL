<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MobilModel;

class Mobil extends BaseController
{
    public function index()
    {
        $mobilModel = new MobilModel();
        $data['mobil'] = $mobilModel->findAll(); // Ambil semua data mobil dari DB
        $data['title'] = 'Daftar Mobil';

        return view('mobil/index', $data);
    }
}
