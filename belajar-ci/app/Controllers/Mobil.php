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

        return view('user/mobil', $data);
    }
   public function admin()
{
    if (session('role') !== 'admin') {
        return redirect()->to('/dashboard'); // Redirect kalau bukan admin
    }

    $mobilModel = new \App\Models\MobilModel();
    $data['mobil'] = $mobilModel->findAll();
    $data['title'] = 'Daftar Semua Mobil';

    return view('admin/mobil', $data); // tampilan daftar mobil
}

public function sewa($id)
{
    $mobilModel = new \App\Models\MobilModel();
    $mobil = $mobilModel->find($id);

    if (!$mobil) {
        return redirect()->to('/mobil')->with('error', 'Mobil tidak ditemukan.');
    }

    return view('sewa/sewa_form', ['mobil' => $mobil]);
}

public function submitSewa()
{
    $rentalModel = new \App\Models\RentalModel();
    $mobilModel  = new \App\Models\MobilModel();

    $user_id = session()->get('user_id');

    $data = [
        'mobil_id'        => $this->request->getPost('mobil_id'),
        'user_id'         => $user_id, // Wajib masuk sini!
        'tanggal_sewa'    => $this->request->getPost('tanggal_sewa'),
        'tanggal_kembali' => $this->request->getPost('tanggal_kembali'),
        'status'          => 'diproses'
    ];

    $rentalModel->insert($data);

    // Update status mobil
    $mobilModel->update($data['mobil_id'], ['status' => 'diproses']);

    return redirect()->to('/mobil')->with('success', 'Sewa berhasil disimpan.');
}




// Tampilkan form tambah mobil
public function create()
{
    if (session('role') !== 'admin') {
        return redirect()->to('/dashboard');
    }

    return view('admin/mobil_form'); // View form tambah
}

// Simpan data mobil baru
public function store()
{
    $mobilModel = new MobilModel();

    $file = $this->request->getFile('foto');
    $fotoName = null;

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $fotoName = $file->getRandomName(); // ini nama file acak
        $file->move('uploads/mobil/', $fotoName);
    }

    $data = [
        'nama_mobil' => $this->request->getPost('nama_mobil'),
        'merk'       => $this->request->getPost('merk'),
        'nopol'      => $this->request->getPost('nopol'),
        'harga_sewa' => $this->request->getPost('harga_sewa'),
        'status'     => $this->request->getPost('status'),
        'foto'       => $fotoName // PENTING: disimpan ke DB!
    ];

    $mobilModel->insert($data);

    return redirect()->to('admin/mobil')->with('success', 'Mobil berhasil ditambahkan.');
}



// Tampilkan form edit mobil
public function edit($id)
{
    $mobilModel = new MobilModel();
    $mobil = $mobilModel->find($id);

    if (!$mobil) {
        return redirect()->to('/mobil/admin')->with('error', 'Mobil tidak ditemukan.');
    }

    return view('admin/mobil_form', ['mobil' => $mobil]);
}

// Update data mobil
public function update($id)
{
    $mobilModel = new MobilModel();
    $mobilLama = $mobilModel->find($id);

    $file = $this->request->getFile('foto');
    $fotoName = $mobilLama['foto']; // default: pakai yang lama

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $fotoName = $file->getRandomName();
        $file->move('uploads/mobil/', $fotoName);

        // Hapus foto lama jika ada
        if (!empty($mobilLama['foto']) && file_exists('uploads/mobil/' . $mobilLama['foto'])) {
            unlink('uploads/mobil/' . $mobilLama['foto']);
        }
    }

    $data = [
        'nama_mobil' => $this->request->getPost('nama_mobil'),
        'merk'       => $this->request->getPost('merk'),
        'nopol'      => $this->request->getPost('nopol'),
        'harga_sewa' => $this->request->getPost('harga_sewa'),
        'status'     => $this->request->getPost('status'),
        'foto'       => $fotoName
    ];

    $mobilModel->update($id, $data);

    return redirect()->to('admin/mobil')->with('success', 'Data mobil berhasil diperbarui.');
}


// Hapus data mobil
public function delete($id)
{
    $mobilModel = new MobilModel();
    $mobil = $mobilModel->find($id);

    if ($mobil) {
        $mobilModel->delete($id);
        return redirect()->to('admin/mobil')->with('success', 'Mobil berhasil dihapus.');
    }

    return redirect()->to('admin/mobil')->with('error', 'Mobil tidak ditemukan.');
}

public function disewa()
{
    $rentalModel = new \App\Models\RentalModel();
    $user_id = session()->get('user_id');

    $data['mobil_disewa'] = $rentalModel
        ->select('rental.*, mobil.nama_mobil, mobil.merk, mobil.nopol, mobil.harga_sewa, mobil.foto')
        ->join('mobil', 'mobil.id = rental.mobil_id')
        ->where('rental.status', 'diproses') // Sesuaikan dengan isi enum
        ->where('rental.user_id', $user_id)
        ->findAll();

    $data['riwayat'] = $rentalModel
        ->select('rental.*, mobil.nama_mobil, mobil.merk, mobil.nopol, mobil.harga_sewa, mobil.foto')
        ->join('mobil', 'mobil.id = rental.mobil_id')
        ->where('rental.status', 'selesai')
        ->where('rental.user_id', $user_id)
        ->orderBy('rental.tanggal_kembali', 'DESC')
        ->findAll();

    return view('user/mobil_disewa', $data);
}

public function dataPenyewaan()
{
    $rentalModel = new \App\Models\RentalModel();

    $penyewaan = $rentalModel
        ->select('rental.*, mobil.nama_mobil, mobil.merk, mobil.nopol, mobil.harga_sewa, users.nama')
        ->join('mobil', 'mobil.id = rental.mobil_id')
        ->join('users', 'users.id = rental.user_id', 'left')
        ->orderBy('rental.id', 'DESC')
        ->findAll();

    return view('admin/penyewaan', ['penyewaan' => $penyewaan]);
}



public function editPenyewaan($id)
{
    $rentalModel = new \App\Models\RentalModel();
    $mobilModel = new \App\Models\MobilModel();

    $penyewaan = $rentalModel
        ->select('rental.*, mobil.harga_sewa')
        ->join('mobil', 'mobil.id = rental.mobil_id')
        ->find($id);

    if (!$penyewaan) {
        return redirect()->to('/admin/penyewaan')->with('error', 'Data penyewaan tidak ditemukan.');
    }

    // Hitung selisih hari dan total harga
    $tanggalSewa = strtotime($penyewaan['tanggal_sewa']);
    $tanggalKembali = strtotime(date('Y-m-d')); // gunakan hari ini sebagai tanggal selesai

    $hari = ceil(($tanggalKembali - $tanggalSewa) / (60 * 60 * 24));
    $totalHarga = $hari * $penyewaan['harga_sewa'];

    // Update status dan tanggal_kembali
    $rentalModel->update($id, [
        'status' => 'selesai',
        'tanggal_kembali' => date('Y-m-d')
    ]);

    // Update status mobil jadi tersedia kembali
    $mobilModel->update($penyewaan['mobil_id'], [
        'status' => 'tersedia'
    ]);

    return redirect()->to('/admin/penyewaan')->with('success', "Penyewaan diselesaikan. Total hari: $hari, Total bayar: Rp" . number_format($totalHarga, 0, ',', '.'));
}


}
