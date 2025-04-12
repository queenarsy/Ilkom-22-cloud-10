<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        // Jika request adalah POST
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();

            // Cek apakah user ditemukan dan password cocok
            if ($user && password_verify($password, $user['password'])) {
                // Set session atau token di sini
                session()->set('user_id', $user['user_id']);
                session()->set('username', $user['username']);
                session()->set('role', $user['role']);

                return redirect()->to('/dashboard'); // Ganti dengan URL yang sesuai
            } else {
                return redirect()->back()->with('error', 'Username atau password salah');
            }
        }

        return view('Auth/login.html'); // Ganti dengan view login Anda
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login'); // Ganti dengan URL login Anda
    }
}