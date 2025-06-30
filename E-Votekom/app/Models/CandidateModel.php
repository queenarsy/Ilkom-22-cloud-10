<?php

namespace App\Models;

use CodeIgniter\Model;

class CandidateModel extends Model
{
    protected $table = 'kadidat'; // ganti nama tabelmu
    protected $primaryKey = 'kadidat_id'; //kandidat id
    protected $allowedFields = ['nama', 'bio', 'photo', 'vote'];
}
