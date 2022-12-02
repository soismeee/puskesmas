<?php

namespace App\Models;

use CodeIgniter\Model;

class ResepModel extends Model

{
    protected $table = 'resep';
    protected $primaryKey = 'kode';
    protected $allowedFields = ['kode', 'tanggal', 'resep', 'id_dokter', 'id_pasien', 'umur', 'alamat_pasien', 'penerima'];

    public function getResep($idresep = false)
    {
        if ($idresep == false) {
            return $this->findAll();
        }
        return $this->where(['kode' => $idresep])->first();
    }
}
