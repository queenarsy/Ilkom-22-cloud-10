<?php

namespace App\Controllers;

use App\Models\CandidateModel;

class  CandidateController extends BaseController
{
    protected $candidateModel;

    public function __construct()
    {
        $this->candidateModel = new CandidateModel();
    }

    public function index()
    {
        $model = new CandidateModel();
        $data['candidates'] = $model->findAll(); // Mengambil semua kandidat
        // Debugging line
        log_message('info', 'Index method called, candidates retrieved: ' . print_r($data['candidates'], true));
        return view('candidates/index', $data); // Ganti dengan nama view yang sesuai
    }


    public function create(){
        return view('admin\create_candidate.php');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'uploaded[photo]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $photo = $this->request->getFile('photo');
        $photoName = $photo->getRandomName();
        $photo->move('uploads/', $photoName);

        $this->candidateModel->save([
            'nama' => $this->request->getPost('name'),
            'bio' => $this->request->getPost('description'),
            'photo' => $photoName,
            'vote' => 0
        ]);

        return redirect()->to('/candidates')->with('success', 'Candidate created successfully.');
    }

    public function edit($id)
    {
        $candidate = $this->candidateModel->find($id);
        return view('candidates/edit', ['candidate' => $candidate]);
    }

    public function update($id)
    {
        $data = [
            'nama' => $this->request->getPost('name'),
            'bio' => $this->request->getPost('description'),
        ];

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $photoName = $photo->getRandomName();
            $photo->move('uploads/', $photoName);
            $data['photo'] = $photoName;
        }

        $this->candidateModel->update($id, $data);

        return redirect()->to('/candidates')->with('success', 'Candidate updated successfully.');
    }

    public function delete($id)
    {
        $this->candidateModel->delete($id);
        return redirect()->to('/candidates')->with('success', 'Candidate deleted successfully.');
    }
}
