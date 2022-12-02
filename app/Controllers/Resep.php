<?php

namespace App\Controllers;

use App\Models\ResepModel;
use App\Models\PasienModel;
use App\Models\DokterModel;

class Resep extends BaseController
{
    public function __construct()
    {
        $this->ResepModel = new ResepModel();
        $this->PasienModel = new PasienModel();
        $this->DokterModel = new DokterModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Resep',
            'Resep' => $this->ResepModel->getResep()
        ];

        return view('resep/resep', $data);
    }
    public function simpan()
    {
        $this->ResepModel->insert([
            'kode' => $this->request->getVar('kode'),
            'tanggal' => $this->request->getVar('tanggal'),
            'resep' => $this->request->getVar('resep'),
            'id_dokter' => $this->request->getVar('id_dokter'),
            'id_pasien' => $this->request->getVar('id_pasien'),
            'umur' => $this->request->getVar('umur'),
            'alamat_pasien' => $this->request->getVar('alamat_pasien'),
            'penerima' => $this->request->getVar('penerima')
        ]);

        //flasdata pesan simpan data
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/resep');
    }
    public function tambah()
    {
        session();
        $data = [
            'title' => 'Simpan',
            'validation' => \Config\Services::validation(),
            'listDokter' => $this->DokterModel->findAll(),
            'listPasien' => $this->PasienModel->findAll()
        ];

        return view('resep/tambah', $data);
    }

    public function hapus($idresep)
    {
        $this->ResepModel->delete(['kode' => $idresep]);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/Resep');
    }

    public function edit($idresep)
    {

        $data = [
            'title' => 'Edit resep',
            'resep' => $this->ResepModel->getResep($idresep),
            'listDokter' => $this->DokterModel->findAll(),
            'listPasien' => $this->PasienModel->findAll()
        ];

        return view('resep/edit', $data);
    }
    public function update($idresep)
    {

        $this->ResepModel->update($idresep, [
            'kode' => $this->request->getPost('kode'),
            'tanggal' => $this->request->getPost('tanggal'),
            'resep' => $this->request->getPost('resep'),
            'id_dokter' => $this->request->getPost('id_dokter'),
            'id_pasien' => $this->request->getPost('id_pasien'),
            'umur' => $this->request->getPost('umur'),
            'alamat_pasien' => $this->request->getPost('alamat_pasien'),
            'penerima' => $this->request->getPost('penerima')
        ]);

        return redirect()->to('/Resep');
    }
}
