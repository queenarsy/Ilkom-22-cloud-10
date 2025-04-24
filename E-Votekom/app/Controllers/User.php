<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CandidateModel;

class User extends BaseController
{
    public function index()
    {
        return view('user/index');
    }

    public function candidatesView()
    {
        $model = new CandidateModel();
        $data['candidates'] = $model->findAll(); // Mengambil semua kandidat
        // Debugging line
        log_message('info', 'Index method called, candidates retrieved: ' . print_r($data['candidates'], true));
        return view('user/candidates_view', $data); // Ganti dengan nama view yang sesuai
    }
}
