<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriksaModel extends Model

{
    protected $table = 'periksa';
    protected $primaryKey = 'id_periksa';
    protected $allowedFields = ['id_periksa', 'id_pasien', 'tanggal_periksa', 'shift', 'waktu_daftar', 'nama_poli'];

    public function getPeriksa($idperiksa = false)
    {
        if ($idperiksa == false) {
            return $this->findAll();
        }
        return $this->where(['id_periksa' => $idperiksa])->first();
    }
}
