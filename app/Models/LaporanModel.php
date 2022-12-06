<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model

{
    protected $table = 'penyakit';
    protected $primaryKey = 'id_penyakit';
    protected $allowedFields = ['id_penyakit', 'nama_penyakit'];

    public function getLaporan($idlap = false)
    {
        if ($idlap == false) {
            return $this->findAll();
        }
        return $this->where(['id_penyakit' => $idlap])->first();
    }
}
