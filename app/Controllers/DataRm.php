<?php

namespace App\Controllers;

use App\Models\DokterModel;
use App\Models\JadwalDokterModel;
use App\Models\PasienModel;
use App\Models\RmModel;

class DataRm extends BaseController
{
    public function __construct()
    {
        $this->RmModel = new RmModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Pemeriksaan',
            'rekammedis' => $this->RmModel->getRekamMedis()
        ];

        return view('rekammedis/datarm', $data);
    }
    public function simpan()
    {
        $this->RmModel->insert([
            'tanggal_periksa' => $this->request->getVar('tanggal_periksa'),
            'id_pasien' => $this->request->getVar('id_pasien'),
            'id_dokter' => $this->request->getVar('id_dokter'),
            'data_subjektif' => $this->request->getVar('data_subjektif'),
            'data_objektif' => $this->request->getVar('data_objektif'),
            'diagnosa' => $this->request->getVar('diagnosa'),
            'planning' => $this->request->getVar('planning')
        ]);

        //flasdata pesan simpan data
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/datarm');
    }
    public function tambahrm()
    {
        $dokterModel = new DokterModel();
        $pasienModel = new PasienModel();

        session();
        $data = [
            'title' => 'Simpan Rekam Medis',
            'validation' => \Config\Services::validation(),
            'listPasien' => $pasienModel->getPasien(),
            'listDokter'   => $dokterModel->getDokter()
        ];

        return view('rekammedis/tambahrm', $data);
    }

    public function hapus($idrm)
    {
        $this->RmModel->delete(['id_rm' => $idrm]);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/datarm');
    }

    public function editrm($idrm)
    {

        $data = [
            'title' => 'Edit Rekam Medis',
            'rekammedis' => $this->RmModel->getRekamMedis($idrm)
        ];

        return view('rekammedis/editrm', $data);
    }
    public function updaterm($idrm)
    {

        $this->RmModel->update($idrm, [
            'id_pasien' => $this->request->getPost('id_pasien'),
            'id_dokter' => $this->request->getPost('id_dokter'),
            'data_subjektif' => $this->request->getPost('data_subjektif'),
            'data_objektif' => $this->request->getPost('data_objektif'),
            'diagnosa' => $this->request->getPost('diagnosa'),
            'planning' => $this->request->getPost('planning'),
            'tanggal_periksa' => $this->request->getPost('tanggal_periksa')
        ]);

        return redirect()->to('/datarm');
    }
}
