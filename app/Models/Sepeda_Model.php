<?php

namespace App\Models;

use CodeIgniter\Model;

class Sepeda_Model extends Model
{
    protected $table = "sepeda";
    protected $primaryKey = "id_sepeda";
    protected $allowedFields =  ['nama_sepeda', 'tipe', 'harga', 'ukuran', 'foto'];

    public function getSepeda()
    {
        return $this->findAll();
    }

    public function getSepedaById($id)
    {
        return $this->find($id);
    }
}
