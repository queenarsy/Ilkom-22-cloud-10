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

            if ($user && password_verify($password, $user['password'])) {
                // Set session
                session()->set([
                    'user_id' => $user['user_id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'isLoggedIn' => true
                ]);

                // Redirect berdasarkan role
                return $this->redirectBasedOnRole(strtolower($user['role']));
            }

            // Jika gagal login
            return redirect()->back()->withInput()->with('error', 'Username atau password salah');
        }

        return view('Auth/login'); // Pastikan file ini ada di app/Views/Auth/login.php
    }

    private function redirectBasedOnRole($role)
    {
        switch ($role) {
            case 'Admin':
                return redirect()->to(site_url('dashboard/admin_dashboard'));
            case 'User':
                return redirect()->to(site_url('dashboard/user_dashboard'));
            default:
                return redirect()->to(site_url('auth/login'))->with('error', 'Role tidak dikenali');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('auth/login'));
    }
}
