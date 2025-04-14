<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'password', 'email', 'role'];

    public function getUser ($username)
    {
        return $this->where('username', $username)->first();
    }
    
    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[20]|is_unique[user.username]',
        'password' => 'required|min_length[6]',
        'email' => 'required|valid_email',
        'role' => 'required'
    ];
}