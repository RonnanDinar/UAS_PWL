<?php
// FILE: app/Controllers/Admin.php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MobilModel;
use App\Models\UserModel;
use App\Models\RentalModel;

class Admin extends BaseController
{
    public function index()
    {
        $mobilModel   = new MobilModel();
        $userModel    = new UserModel();
        $rentalModel  = new RentalModel();

        $data = [
            'title'             => 'Admin Dashboard',
            'total_mobil'       => $mobilModel->where('status', 'tersedia')->countAllResults(),
            'total_user'        => $userModel->countAll(),
            'total_penyewaan'   => $rentalModel->countAll()
        ];

        return view('admin/dashboard', $data);
    }

    public function manajemenUser()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        return view('admin/user_list', $data);
    }

    public function tambahUser()
    {
        return view('admin/user_form');
    }

    public function simpanUser()
    {
        $userModel = new UserModel();
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role')
        ];
        $userModel->insert($data);
        return redirect()->to('/admin/user')->with('success', 'User berhasil ditambahkan.');
    }

    public function editUser($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);
        return view('admin/user_form', $data);
    }

    public function updateUser($id)
    {
        $userModel = new UserModel();
        $data = [
            'nama'  => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'role'  => $this->request->getPost('role')
        ];
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $userModel->update($id, $data);
        return redirect()->to('/admin/user')->with('success', 'User berhasil diperbarui.');
    }

    public function hapusUser($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to('/admin/user')->with('success', 'User berhasil dihapus.');
    }

    public function notaPenyewaan($id)
{
    $rentalModel = new \App\Models\RentalModel();

    $penyewaan = $rentalModel
        ->select('rental.*, mobil.nama_mobil, mobil.merk, mobil.nopol, mobil.harga_sewa, users.nama')
        ->join('mobil', 'mobil.id = rental.mobil_id')
        ->join('users', 'users.id = rental.user_id', 'left')
        ->find($id);

    if (!$penyewaan) {
        return redirect()->to('/admin/penyewaan')->with('error', 'Data tidak ditemukan.');
    }

    return view('admin/nota_penyewaan', ['data' => $penyewaan]);
}

}
