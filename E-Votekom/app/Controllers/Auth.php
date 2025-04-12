<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        // Cek apakah form dikirim via POST
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();

            // Cek apakah user ditemukan dan password cocok
            if ($user && password_verify($password, $user['password'])) {
                // Set session user
                session()->set([
                    'user_id'     => $user['user_id'],
                    'username'    => $user['username'],
                    'role'        => $user['role'],
                    'isLoggedIn'  => true,
                ]);

                // Redirect berdasarkan role
                return $this->redirectBasedOnRole(strtolower($user['role']));
            }

            // Jika gagal login
            return redirect()->back()->withInput()->with('error', 'Username atau password salah');
        }

        // Tampilkan view login (pakai login.php, bukan login.html)
        return view('Auth/login');
    }

    private function redirectBasedOnRole($role)
    {
        switch ($role) {
            case 'Admin':
                return redirect()->to(site_url('admin/admin_dashboard'));
            case 'User':
                return redirect()->to(site_url('user/user_dashboard'));
            default:
                return redirect()->to(site_url('auth/login'))->with('error', 'Role tidak dikenali');
        }
    }

    public function logout()
    {
        // Hapus semua session
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to(site_url('auth/login'));
    }
}
