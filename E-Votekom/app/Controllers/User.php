<?php

namespace App\Controllers;
use  App\Models\VoteModel;
use App\Models\CandidateModel;

class User extends BaseController
{
    public function index()
    {
        $model = new CandidateModel();
        $voteModel = new VoteModel(); // Instantiate the VoteModel
        $vote_id = $this->request->getPost('vote_id'); // Retrieve the vote ID from the request
    
        if ($vote_id) {
            log_message('debug', 'Deleting vote with ID: ' . $vote_id);
            $voteModel->delete($vote_id); // Delete the vote if the ID is provided
    
            // Check if the vote was successfully deleted
            $deletedVote = $voteModel->find($vote_id);
            if ($deletedVote) {
                log_message('debug', 'Vote deletion failed for ID: ' . $vote_id);
            } else {
                log_message('debug', 'Vote successfully deleted for ID: ' . $vote_id);
            }
        }
    
        // Re-fetch the candidates with updated vote counts
        $candidates = $model->select('kadidat.*, COUNT(vote.vote_id) as vote_count')
                            ->join('vote', 'vote.kadidat_id = kadidat.kadidat_id', 'left')
                            ->groupBy('kadidat.kadidat_id')
                            ->findAll();
    
        // Log the candidates data for debugging
        log_message('debug', 'kadidat data: ' . json_encode($candidates));
    
        // Send candidates to the view
        return view('user/index', ['candidates' => $candidates]);
    }
}
