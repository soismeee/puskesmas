<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model

{
    protected $table = 'jadwal_dokter';
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = ['id_jadwal', 'jadwal_dokter', 'id_dokter', 'jam'];

    public function getJadwal($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where('id_jadwal', $id)->first();
    }
}
