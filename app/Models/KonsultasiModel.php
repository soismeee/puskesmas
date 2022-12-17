<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model

{
    protected $table = 'konsultasi';
    protected $primaryKey = 'id_konsultasi';
    protected $allowedFields = ['id_konsultasi', 'id_dokter', 'id_penyakit', 'id_pasien', 'tanggal_konsul'];

    public function getKonsultasi($idkonsul = false)
    {
        if ($idkonsul == false) {
            return $this->findAll();
        }
        return $this->where(['id_konsultasi' => $idkonsul])->join('pasien', 'pasien.id_pasien = konsultasi.id_pasien')->join('dokter', 'dokter.id_dokter = konsultasi.id_dokter')->first();
    }

    public function generateCode(){
        $builder = $this->table('konsultasi');
        $builder->selectMax('id_konsultasi', 'idMax');
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
        $id = session()->get('id_user');
        return 'KONSUL'.$id.$kd;
    }
}
