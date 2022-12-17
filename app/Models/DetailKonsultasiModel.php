<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailKonsultasiModel extends Model

{
    protected $table = 'detail_konsultasi';
    protected $primaryKey = 'id_detkon';
    protected $allowedFields = ['id_detkon','id_konsultasi', 'pesan', 'akses'];

    public function getDetKonsultasi($idkonsul = false)
    {
        if ($idkonsul == false) {
            return $this->findAll();
        }
        return $this->where(['id_konsultasi' => $idkonsul])->findAll();
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
