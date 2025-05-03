<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $userModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->userModel = new UserModel();  // Initialize model
    }

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
            session()->set('user_id', $user['user_id']);
            session()->set('username', $user['username']);
            session()->set('role', trim($user['role']));

            log_message('debug', 'User  role: ' . $user['role']);

            if (trim($user['role']) === 'Admin') {
                return redirect()->to('admin/index');
            } elseif (trim($user['role']) === 'User') { // Pastikan tidak ada spasi di sini
                return redirect()->to('user/index');
            }else {
                return redirect()->to('Login/login')->with('error', 'Role not recognized');
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
        return view('admin/create_user');
    }

    public function userList(){
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll(); // Mengambil semua pengguna
        return view('admin/user_list', $data); // Ganti dengan nama view yang sesuai
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

        return redirect()->to('User/user_list')->with('success', 'Registration successful!');
    }

    //For user update and delete
    public function edit($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id); // Mengambil data pengguna berdasarkan ID
        return view('admin/user_edit', $data); // Ganti dengan nama view yang sesuai
    }
    public function update($id)
    {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
        ];

        // Update password only if it's provided
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $userModel->update($id, $data);
        return redirect()->to('User/user_list')->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        // Ensure $id is valid and then delete the user
        if (!$id) {
            return redirect()->to('User/user_list')->with('error', 'Invalid user ID.');
        }
    
        $this->userModel->delete($id);
        return redirect()->to('User/user_list')->with('success', 'User deleted successfully.');
    }
}