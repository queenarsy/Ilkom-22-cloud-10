<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Pengguna extends BaseController
{
    public function profil()
    {
        $session = session();
        $userId = $session->get('user_id'); // pastikan Anda menyimpan 'id' saat login

        // Membuat instance dari model UserModel untuk mengakses data pengguna
        $userModel = new UserModel();
        // Mengambil data pengguna berdasarkan ID pengguna yang diberikan
        $user = $userModel->find($userId);

        return view('pengguna/profil', ['user' => $user]);
    }

    public function ubahPassword()
    {
        helper(['form']);
        $rules = [
            'password_lama' => 'required',
            'password_baru' => 'required|min_length[6]',
            'konfirmasi_password' => 'matches[password_baru]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            // Mengembalikan user ke halaman sebelumnya dengan input yang sudah diisi sebelumnya

        }

        $session = session();
        $userId = $session->get('user_id');

        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($userId);

        if (!password_verify($this->request->getPost('password_lama'), $user['password'])) {
            return redirect()->back()->with('error', 'Password lama tidak cocok.'); //pemberitahuan jika eror
        }

        $userModel->update($userId, [
            'password' => password_hash($this->request->getPost('password_baru'), PASSWORD_DEFAULT)
        ]);

        return redirect()->back()->with('success', 'Password berhasil diubah.');
    }
}
