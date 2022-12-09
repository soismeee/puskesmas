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
        $this->PasienModel = new PasienModel();
        $this->DokterModel = new DokterModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Pemeriksaan',
            'rekammedis' => $this->RmModel->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien')->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter')->findAll()
        ];

        return view('rekammedis/datarm', $data);
    }
    public function simpan()
    {
        $this->RmModel->insert([
            'id_rm' => $this->request->getVar('id_rm'),
            'tanggal_periksa' => $this->request->getVar('tanggal_periksa'),
            'id_pasien' => $this->request->getVar('id_pasien'),
            'id_dokter' => $this->request->getVar('id_dokter'),
            'data_subjektif' => $this->request->getVar('data_subjektif'),
            'data_objektif' => $this->request->getVar('data_objektif'),
            'diagnosa' => $this->request->getVar('diagnosa'),
            'planning' => $this->request->getVar('planning'),
        ]);

        //flasdata pesan simpan data
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/datarm');
    }
    public function tambahrm()
    {
        session();
        $data = [
            'title' => 'Simpan Rekam Medis',
            'validation' => \Config\Services::validation(),
            'listPasien' => $this->PasienModel->getPasien(),
            'listDokter'   => $this->DokterModel->getDokter()
        ];

        return view('periksa/tambahrm', $data);
    }

    public function tambahrbp(){
        session();
        $data = [
            'title' => 'Tambah Resep',
            'validation' => \Config\Services::validation(),
            'listDokter' => $this->DokterModel->findAll(),
            'listPasien' => $this->PasienModel->findAll()
        ];

        return view('resep/tambah', $data);
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
            'rekammedis' => $this->RmModel->getRekamMedis($idrm),
            'listDokter'   => $this->DokterModel->getDokter()
        ];

        return view('rekammedis/editrm', $data);
    }
    public function updaterm($id_rm)
    {

        $this->RmModel->update($id_rm, [
            'tanggal_periksa' => $this->request->getPost('tanggal_periksa'),
            'id_dokter' => $this->request->getPost('id_dokter'),
            'data_subjektif' => $this->request->getPost('data_subjektif'),
            'data_objektif' => $this->request->getPost('data_objektif'),
            'diagnosa' => $this->request->getPost('diagnosa'),
            'planning' => $this->request->getPost('planning')
        ]);

        return redirect()->to('/datarm');
    }

    public function autocode(){
        return json_encode($this->RmModel->generateCode());
    }
}
