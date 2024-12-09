<?php

namespace App\Controllers;

use App\Models\User_Model;

class User extends BaseController
{

    protected $model_user;

    public function __construct()
    {
        $this->model_user = new User_Model();
    }

    public function store()
    {


        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");
        $nama = $this->request->getPost("nama");
        $role = $this->request->getPost("role");

        $this->model_user->register($username, $password, $nama, $role);
        session()->setFlashdata('pendaftaran_berhasil', 'Pendaftaran berhasil!');
        return redirect()->to('/login');
    }

    public function index()
    {
        return view("login/register");
    }

    public function indexlogin()
    {
        return view("login/login");
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan username

        $user = $this->model_user->getUserByUsername($username);


        // Jika user tidak ditemukan atau password salah
        if (!$user || !password_verify($password, $user['password'])) {
            session()->setFlashdata('error', 'Username atau password salah.');
            return redirect()->to('/login');
        }

        // Jika login berhasil, set session
        session()->set([
            'user_id'    => $user['id'],
            'username'   => $user['username'],
            'nama'       => $user['nama'],
            'role'       => $user['role'],
            'logged_in'  => true
        ]);

        // Redirect ke halaman dashboard atau halaman utama
        return redirect()->to('/');
    }

    public function logout()
    {
        // Hapus session untuk logout
        session()->destroy();
        return redirect()->to('/login');
    }
}
