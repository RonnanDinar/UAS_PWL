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
    public function sewa($id)
{
    $mobilModel = new \App\Models\MobilModel();
    $mobil = $mobilModel->find($id);

    if (!$mobil) {
        return redirect()->to('/mobil')->with('error', 'Mobil tidak ditemukan.');
    }

    return view('mobil/sewa_form', ['mobil' => $mobil]);
}
   public function admin()
{
    if (session('role') !== 'admin') {
        return redirect()->to('/dashboard'); // Redirect kalau bukan admin
    }

    $mobilModel = new \App\Models\MobilModel();
    $data['mobil'] = $mobilModel->findAll();
    $data['title'] = 'Daftar Semua Mobil';

    return view('mobil/admin_index', $data); // tampilan daftar mobil
}

    public function submitSewa()
{
    $rentalModel = new \App\Models\RentalModel();
    $mobilModel = new \App\Models\MobilModel();

    $data = [
        'mobil_id'        => $this->request->getPost('mobil_id'),
        'nama_penyewa'    => $this->request->getPost('nama_penyewa'),
        'tanggal_sewa'    => $this->request->getPost('tanggal_sewa'),
        'tanggal_kembali' => $this->request->getPost('tanggal_kembali'),
        'status'          => 'disewa'
    ];

    $rentalModel->insert($data);

    // Update status mobil ke 'disewa'
    $mobilModel->update($data['mobil_id'], ['status' => 'disewa']);

    return redirect()->to('/mobil')->with('success', 'Sewa berhasil disimpan dan mobil disembunyikan.');
}


}
