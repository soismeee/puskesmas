<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $table            = 'dokter';
    protected $primaryKey       = 'id_dokter';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    public function getDokter($iddokter = false)
    {
        if ($iddokter == false) {
            return $this->findAll();
        }
        return $this->where(['id_dokter' => $iddokter])->first();
    }
}
