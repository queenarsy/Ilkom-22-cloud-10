<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->getUser ($username);

        if (!$user) {
            log_message('debug', 'User  not found with username: ' . $username);
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }

        if (password_verify($password, $user['password'])) {
            session()->set('loggedIn', true);
            session()->set('userId', $user['user_id']);
            session()->set('username', $user['username']);
            session()->set('role', trim($user['role']));

            log_message('debug', 'User  role: ' . $user['role']);

            if (trim($user['role']) === 'Admin') {
                return redirect()->to('admin/index');
            } elseif (trim($user['role']) === 'User') { // Pastikan tidak ada spasi di sini
                return redirect()->to('user/index');
            }else {
                return redirect()->to('/login')->with('error', 'Role not recognized');
            }
        } else {
            log_message('debug', 'Invalid password for username: ' . $username);
                return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('Login/login');
    }

    public function register()
    {
        return view('register');
    }

    public function registerProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $role = $this->request->getPost('role');

        $userModel = new UserModel();

        if ($userModel->getUser ($username)) {
            return redirect()->back()->with('error', 'Username already exists');
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $userModel->save([
            'username' => $username,
            'password' => $hashedPassword,
            'email' => $email,
            'role' => $role,
        ]);

        return redirect()->to('Login/login')->with('success', 'Registration successful!');
    }
}