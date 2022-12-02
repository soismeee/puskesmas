<?php

namespace App\Models;

use CodeIgniter\Model;

class RmModel extends Model

{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'id_rm';
    protected $allowedFields = ['id_pasien', 'id_dokter', 'data_subjektif', 'data_objektif', 'diagnosa', 'planning', 'tanggal_periksa'];

    public function getRekamMedis($idrm = false)
    {
        if ($idrm == false) {
            return $this->findAll();
        }
        return $this->where(['id_rm' => $idrm])->first();
    }
}
