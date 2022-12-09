<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModel extends Model

{
    protected $table = 'penyakit';
    protected $primaryKey = 'id_penyakit';
    protected $allowedFields = ['id_penyakit', 'nama_penyakit', 'ket_penyakit'];

    public function getPenyakit($idpenyakit = false)
    {
        if ($idpenyakit == false) {
            return $this->findAll();
        }
        return $this->where(['id_penyakit' => $idpenyakit])->first();
    }
}
