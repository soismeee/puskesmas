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

    public function tambah(){
        session();
        $data = [
            'title' => 'Tambah Pengguna',
            'validation' => \Config\Services::validation()
        ];

        return view('pengguna/tambah', $data);
    }

    public function simpan()
    {
        $this->DataPenggunaModel->insert([
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'hak_akses' => $this->request->getVar('hak_akses'),
        ]);

        //flasdata pesan simpan data
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/datapengguna');
    }

    public function hapus($id_user)
    {
        $this->DataPenggunaModel->delete(['id_user' => $id_user]);

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
        if ($this->request->getVar('password') == !null) {
            $this->DataPenggunaModel->update($idpasien, [
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'password' => md5($this->request->getVar('password')),
                'hak_akses' => $this->request->getVar('hak_akses'),
            ]);
        }else{
            $this->DataPenggunaModel->update($idpasien, [
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'hak_akses' => $this->request->getVar('hak_akses'),
            ]);
        }
        session()->setFlashdata('pesan', 'Data Anda berhasil diubah!');
        return redirect()->to('/datapengguna');
    }
}
