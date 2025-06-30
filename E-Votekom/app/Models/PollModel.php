<?php

namespace App\Models;

use CodeIgniter\Model;

class PollModel extends Model
{
    protected $table = 'polls';
    protected $primaryKey = 'polls_id'; //Kunci Utama
    protected $allowedFields = ['question', 'created_at'];

    public function getPolls()
    {
        return $this->findAll(); //Fungsi untuk menemukan semua polling
    }

    public function getPoll($id)
    {
        return $this->find($id); //Fungsi cara
    }

    public function createPoll($data) //Fungsi buat data
    {
        return $this->insert($data); //fungsi menambah data
    }
}