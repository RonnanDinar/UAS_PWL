<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

   public function loginPost()
{
    $session = session();
    $model = new UserModel();
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $user = $model->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {
        $session->set([
            'user_id'   => $user['id'],
            'nama'      => $user['nama'],
            'role'      => $user['role'],
            'logged_in' => true
        ]);

        // Tambahkan logika ini di sini
        if ($user['role'] == 'guest') {
            return redirect()->to('/user');
        } else {
            return redirect()->to('/' . $user['role']);
        }

    } else {
        return redirect()->back()->with('error', 'Email atau password salah.');
    }
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }


public function register()
{
     return view('auth/register');
}

public function registerSave()
{
    $rules = [
    'nama' => 'required|min_length[6]',
    'email' => 'required|valid_email',
    'password' => 'required|min_length[6]',
    ];

     if ($this->validate($rules)) {
     $data = [
    'nama'     => $this->request->getVar('nama'),
    'email'    => $this->request->getVar('email'),
    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
    'role'     => 'guest'
];

$userModel = new \App\Models\UserModel();
$userModel->save($data);

        session()->setFlashdata('success', 'Registrasi berhasil. Silakan login.');
        return redirect()->to('/login');
    } else {
        session()->setFlashdata('failed', $this->validator->listErrors());
        return redirect()->back()->withInput();
    }
}

}   