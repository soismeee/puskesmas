<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriksaModel extends Model

{
    protected $table = 'periksa';
    protected $primaryKey = 'id_periksa';
    protected $allowedFields = ['id_periksa', 'id_pasien', 'tanggal_periksa', 'shift', 'waktu_daftar', 'nama_poli_periksa', 'status'];

    public function getPeriksa($idperiksa = false)
    {
        if ($idperiksa == false) {
            return $this->findAll();
        }
        return $this->where(['id_periksa' => $idperiksa])->join('pasien', 'pasien.id_pasien = periksa.id_pasien')->first();
    }

    public function generateCode(){
        $builder = $this->table('periksa');
        $builder->selectMax('id_periksa', 'idMax');
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
        $id = session()->get('id_user');
        return 'PRS'.$id.'-'.$kd;
    }
}
