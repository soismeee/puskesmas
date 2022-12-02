<?php

namespace App\Controllers;

use App\Models\DataPenggunaModel;

class DataPengguna extends BaseController
{
    public function __construct()
    {
        $this->DataPenggunaModel = new DataPenggunaModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Pengguna',
            'pengguna' => $this->DataPenggunaModel->getPengguna()
        ];

        return view('pengguna/datapengguna', $data);
    }
    public function simpan()
    {
        $this->DataPenggunaModel->insert([
            'id_pasien' => $this->request->getVar('id_pasien'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);

        //flasdata pesan simpan data
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/datapengguna');
    }

    public function hapus($idpasien)
    {
        $this->DataPenggunaModel->delete(['id_pasien' => $idpasien]);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/datapengguna');
    }

    public function editpengguna($idpasien)
    {

        $data = [
            'title' => 'Edit Pengguna',
            'pengguna' => $this->DataPenggunaModel->getPengguna($idpasien)
        ];

        return view('pengguna/editpengguna', $data);
    }
    public function updatepengguna($idpasien)
    {

        $this->DataPenggunaModel->update($idpasien, [
            'id_pasien' => $this->request->getPost('id_pasien'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ]);

        return redirect()->to('/datapengguna');
    }
}
