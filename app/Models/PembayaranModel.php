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
        return $this->where(['id_transaksi' => $idtransaksi])->first();
    }
}
