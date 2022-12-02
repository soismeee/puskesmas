<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPenggunaModel extends Model

{
    protected $table = 'pengguna';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'nama', 'username', 'password', 'hak_akses'];

    public function getPengguna($id_user = false)
    {
        if ($id_user == false) {
            return $this->findAll();
        }
        return $this->where(['id_user' => $id_user])->first();
    }
}
