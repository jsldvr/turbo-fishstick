<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password'];

    public function getUser($email) {
        return $this->where(['email' => $email])->first();
    }

    public function insertUser($data) {
        $this->insert($data);
        return $this->db->insertID();
    }
}
