<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MobilModel;
use App\Models\RentalModel;

class User extends BaseController
{
    public function index()
    {
        $mobilModel = new MobilModel();
        $rentalModel = new RentalModel();

        $data = [
            'mobilTersedia'   => $mobilModel->where('status', 'tersedia')->countAllResults(),
            'penyewaanAktif'  => $rentalModel->where('status', 'disewa')->countAllResults(),
        ];

        return view('user/dashboard', $data);
    }
}
