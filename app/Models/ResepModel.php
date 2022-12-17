<?php

namespace App\Models;

use CodeIgniter\Model;

class ResepModel extends Model

{
    protected $table = 'resep';
    protected $primaryKey = 'kode';
    protected $allowedFields = ['kode','id_rm', 'tanggal', 'resep', 'id_dokter', 'id_pasien', 'umur', 'alamat_pasien', 'penerima'];

    public function getResep($idresep = false)
    {
        if ($idresep == false) {
            return $this->findAll();
        }
        return $this->where(['kode' => $idresep])->join('pasien', 'pasien.id_pasien = resep.id_pasien')->join('dokter', 'dokter.id_dokter = resep.id_dokter')->first();
        
    }

    public function generateCode(){
        $builder = $this->table('resep');
        $builder->selectMax('kode', 'idMax');
        $query = $builder->get();

        if($query->getNumRows() > 0){
            foreach ($query->getResult() as $key) {
                $kd = '';
                $ambildata = substr($key->idMax, -4);
                $increment = intval($ambildata)+1;

                $kd = sprintf('%03s', $increment);
            }
        } else{
            $kd = '001';
        }

        return 'RS'.$kd;
    }
}
