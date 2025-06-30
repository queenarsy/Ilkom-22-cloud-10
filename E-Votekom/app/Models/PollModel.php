<?php

namespace App\Models;

use CodeIgniter\Model;

class PollModel extends Model
{
    protected $table = 'polls';
    protected $primaryKey = 'polls_id'; //kunci Utama
    protected $allowedFields = ['question', 'created_at'];

    public function getPolls()
    {
        return $this->findAll(); //fungsi untuk menemukan semua polling
    }

    public function getPoll($id)
    {
        return $this->find($id); //fungsi cara
    }

    public function createPoll($data) //fungsi buat data
    {
        return $this->insert($data); //fungsi menambah data
    }
}