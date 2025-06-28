<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MobilModel;
use App\Models\RentalModel;

class User extends BaseController
{
    public function index()
{
    $mobilModel  = new MobilModel();
    $rentalModel = new RentalModel();

    $user_id = session()->get('user_id'); // ambil dari session

    $data = [
        'mobilTersedia'  => $mobilModel->where('status', 'tersedia')->countAllResults(),
        'penyewaanAktif' => $rentalModel->where('user_id', $user_id)->countAllResults(), // total semua sewa oleh user ini
    ];

    return view('user/dashboard', $data);
}

}
