<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table = "user";
    protected $primaryKey = "id";
    protected $allowedFields =  ['username', 'password', 'nama', 'role'];

    public function register($username, $password, $nama, $role)
    {
        return $this->save([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nama' => $nama,
            'role' => $role
        ]);
    }

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
