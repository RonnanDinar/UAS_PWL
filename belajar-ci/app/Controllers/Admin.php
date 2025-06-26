<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MobilModel;
use App\Models\UserModel;
use App\Models\RentalModel;

class Admin extends BaseController
{
    public function index()
    {
        $mobilModel = new MobilModel();
        $userModel = new UserModel();
        $rentalModel = new RentalModel();

        $data = [
            'title'              => 'Admin Dashboard',
            'total_mobil'        => $mobilModel->where('status', 'tersedia')->countAllResults(), // 👈 filter mobil tersedia
            'total_user'         => $userModel->countAll(),
            'total_penyewaan'    => $rentalModel->countAll()
        ];

        return view('admin/dashboard', $data);
    }
}
