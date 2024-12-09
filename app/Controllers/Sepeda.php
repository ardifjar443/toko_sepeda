<?php

namespace App\Controllers;

use App\Models\Sepeda_Model;

class Sepeda extends BaseController
{

    protected $model_sepeda;

    public function __construct()
    {
        $this->model_sepeda = new Sepeda_Model();
    }



    public function index()
    {
        if (!session()->get('logged_in')) {
            // Set flashdata untuk menunjukkan pengguna harus login
            session()->setFlashdata('error', 'Anda harus login terlebih dahulu.');

            // Arahkan ke halaman login
            return redirect()->to('/login');
        }
        $listSepeda = $this->model_sepeda->getSepeda();
        $data = [
            'sepeda' => $listSepeda
        ];



        if (session()->get('role') == 'admin') {
            return view('menu_utama/menuadmin', $data);
        } else {
            return view('menu_utama/menu', $data);
        }
    }


    public function get($id)
    {
        $sepeda = $this->model_sepeda->getSepedaById($id);
        if (!$sepeda) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'sepeda tidak ditemukan']);
        }
        $sepeda['available_types'] = ['MTB', 'roadbike', 'Hybrid', 'BMX', 'Sepeda Lipat', 'Gravel'];
        return $this->response->setJSON($sepeda);
    }
}
