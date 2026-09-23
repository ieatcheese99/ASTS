<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        $data = [
            'title'      => 'Login Admin — Purnomo Coto Makassar',
            'validation' => \Config\Services::validation(),
        ];

        return view('auth/login', $data);
    }

    public function attemptLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $this->adminModel->getAdminByUsername($username);

        if ($admin && password_verify($password, $admin['password'])) {
            session()->set([
                'admin_id'   => $admin['id'],
                'username'   => $admin['username'],
                'isLoggedIn' => true,
            ]);

            return redirect()->to('/admin/dashboard')->with('success', 'Selamat datang kembali, Admin!');
        }

        return redirect()->back()->withInput()->with('error', 'Username atau password yang Anda masukkan salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah berhasil keluar.');
    }
}
