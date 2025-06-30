<?php

namespace App\Models;

use CodeIgniter\Model;

class CandidateModel extends Model
{
    protected $table = 'kadidat'; // Ganti nama tabelmu
    protected $primaryKey = 'kadidat_id'; //kandidat ID
    protected $allowedFields = ['nama', 'bio', 'photo', 'vote'];
}
