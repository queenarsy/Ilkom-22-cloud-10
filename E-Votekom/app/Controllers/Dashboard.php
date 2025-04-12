<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function admin_dashboard()
    {
        // Logika untuk menampilkan dashboard admin
        return view('Dashboard/admin_dashboard'); // Ganti dengan view dashboard admin Anda
    }

    public function user_dashboard()
    {
        // Logika untuk menampilkan dashboard user
        return view('Dashboard/user_dashboard'); // Ganti dengan view dashboard user Anda
    }
}