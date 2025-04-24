<?php 
namespace App\Controllers;

use App\Models\CandidateModel;
use App\Models\VoteModel;

class CandidateController extends BaseController
{
    public function index()
    {
        $model = new CandidateModel();
        $data['candidates'] = $model->findAll(); // Mengambil semua kandidat
        // Debugging line
        log_message('info', 'Index method called, candidates retrieved: ' . print_r($data['candidates'], true));
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
            'nama' => $this->request->getPost('nama'),
            'bio' => $this->request->getPost('bio'),
            'votes' => 0 // Inisialisasi suara dengan 0
        ];
        $model->insert($data);
        return redirect()->to('/candidates');
    }

    public function vote($id) {
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('Login/login')->with('error', 'You must be logged in to vote.');
        }
    
        $voteType = 1; // Misalnya, 1 untuk upvote
    
        // Instansiasi model VoteModel
        $voteModel = new VoteModel();
    
        // Cek apakah pengguna sudah memberikan suara untuk kandidat ini
        $existingVote = $voteModel->where([
            'user_id' => $userId,
            'kadidat_id' => $id // Pastikan ini adalah nama kolom yang benar
        ])->first();
    
        if ($existingVote) {
            return redirect()->to('polls/view')->with('error', 'You have already voted for this candidate.');
        }
    
        $model = new CandidateModel();
        $candidate = $model->find($id);
    
        if ($candidate) {
            // Tambahkan logika untuk menambah suara
            $candidate['votes'] += 1; // Pastikan Anda mengupdate field yang benar
            $model->update($id, $candidate);
    
            // Simpan suara baru ke tabel votes
            $data = [
                'user_id' => $userId,
                'kadidat_id' => $id, // Pastikan ini adalah nama kolom yang benar
                'vote_type' => $voteType,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $voteModel->insert($data);
    
            // Cek peran pengguna
            $session = session();
            $userRole = $session->get('role'); // Mengasumsikan Anda menyimpan peran pengguna di session
    
            if ($userRole === 'Admin') {
                return redirect()->to('candidates/index')->with('message', 'Vote successfully cast!');
            } else {
                return redirect()->to('user/candidates_view')->with('message', 'Vote successfully cast!');
            }
        } else {
            return redirect()->to('polls/view')->with('error', 'Candidate not found.');
        }
    }

}