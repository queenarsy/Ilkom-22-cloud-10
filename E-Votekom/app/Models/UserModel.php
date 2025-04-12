<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'password', 'email', 'role'];

    public function get_user_by_username($username)
{
    return $this->where('username', $username)->first();
}
}