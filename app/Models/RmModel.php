<?php

namespace App\Models;

use CodeIgniter\Model;

class RmModel extends Model

{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'id_rm';
    protected $allowedFields = ['id_rm','id_pasien', 'id_dokter', 'data_subjektif', 'data_objektif', 'diagnosa', 'planning', 'tanggal_periksa'];

    public function getRekamMedis($idrm = false)
    {
        if ($idrm == false) {
            return $this->findAll();
        }
        return $this->where(['id_rm' => $idrm])->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien')->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter')->first();
    }

    public function generateCode(){
        $builder = $this->table('rekam_medis');
        $builder->selectMax('id_rm', 'idMax');
        $query = $builder->get();

        if($query->getNumRows() > 0){
            foreach ($query->getResult() as $key) {
                $kd = '';
                $ambildata = substr($key->idMax, -4);
                $increment = intval($ambildata)+1;

                $kd = sprintf('%04s', $increment);
            }
        } else{
            $kd = '0001';
        }

        return 'RM'.$kd;
    }
}
