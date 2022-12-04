<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model

{
    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    protected $allowedFields = ['id_pasien', 'id_pengguna', 'nama_pasien', 'tanggal_lahir', 'jekel', 'nama_kk', 'alamat_pasien', 'nama_poli'];

    public function getPasien($idpasien = false)
    {
        if ($idpasien == false) {
            return $this->findAll();
        }
        return $this->where(['id_pasien' => $idpasien])->first();
    }
}
