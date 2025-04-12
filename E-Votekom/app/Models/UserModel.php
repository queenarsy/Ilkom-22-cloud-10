<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'password', 'email', 'role'];

    // Jika Anda ingin menggunakan hashing untuk password
    protected $useTimestamps = true;
}