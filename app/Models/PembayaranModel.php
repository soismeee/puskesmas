<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model

{
    protected $table = 'nota';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_transaksi', 'jenis_transaksi', 'id_resep', 'jumlah', 'total'];

    public function getPembayaran($idtransaksi = false)
    {
        if ($idtransaksi == false) {
            return $this->findAll();
        }
        return $this->where(['id_transaksi' => $idtransaksi])->join('resep', 'resep.kode = nota.id_resep')->join('pasien', 'pasien.id_pasien = resep.id_pasien')->join('rekam_medis', 'rekam_medis.id_rm = resep.id_rm')->join('dokter', 'dokter.id_dokter = resep.id_dokter')->first();
    }

    public function generateCode(){
        $builder = $this->table('nota');
        $builder->selectMax('id_transaksi', 'idMax');
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
        return 'NOTA'.$kd;
    }
}
