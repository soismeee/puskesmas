<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $table            = 'dokter';
    protected $primaryKey       = 'id_dokter';
    protected $allowedFields    = ['id_pasien', 'id_pengguna', 'nama_dokter', 'alamat_dokter', 'no_tlp', 'jenis_poli', 'status'];

    public function getDokter($iddokter = false)
    {
        if ($iddokter == false) {
            return $this->findAll();
        }
        return $this->where(['id_dokter' => $iddokter])->first();
    }
}
