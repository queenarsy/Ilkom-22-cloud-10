<?php

namespace App\Models;

use CodeIgniter\Model;

class CandidateModel extends Model
{
    protected $table = 'kadidat';
    protected $primaryKey = 'kadidat_id';
    protected $allowedFields = ['poll_id', 'nama', 'vote'];

    public function getKadidat($pollId)
    {
        return $this->where('poll_id', $pollId)->findAll();
    }

    public function createKadidat($data)
    {
        return $this->insert($data);
    }

    public function updateVote($id, $vote)
    {
        return $this->update($id, ['vote' => $vote]);
    }
}