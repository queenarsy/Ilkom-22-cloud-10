<?php 
namespace App\Controllers;

use App\Models\CandidateModel;

class CandidateController extends BaseController
{
    public function index()
    {
        $model = new CandidateModel();
        $data['candidates'] = $model->findAll(); // Mengambil semua kandidat
        return view('candidates/index', $data); // Ganti dengan nama view yang sesuai
    }

    public function create()
    {
        return view('admin/create_candidate');
    }

    public function store()
    {
        $model = new CandidateModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'bio' => $this->request->getPost('bio'),
            'votes' => 0 // Inisialisasi suara dengan 0
        ];
        $model->insert($data);
        return redirect()->to('/candidates');
    }

    public function vote($id)
    {
        $model = new CandidateModel();
        $candidate = $model->find($id);

        if ($candidate) {
            // Tambahkan logika untuk menambah suara
            $candidate['vote'] += 1;
            $model->update($id, $candidate);
            return redirect()->to('candidate/index')->with('message', 'Vote successfully cast!');
        } else {
            return redirect()->to('candidate/index')->with('error', 'Candidate not found.');
        }
    }
}