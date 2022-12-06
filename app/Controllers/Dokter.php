<?php

namespace App\Controllers;
use App\Models\DokterModel;
use App\Models\JadwalModel;
use App\Models\DataPenggunaModel;

class Dokter extends BaseController
{
    public function __construct()
    {
        $this->DokterModel = new DokterModel();
        $this->JadwalModel = new JadwalModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dokter',
            'dokter' => $this->DokterModel->getDokter()
        ];
        return view('dokter/listdokter', $data);
    }

    public function tambah()
    {
        session();
        $data = [
            'title' => 'Tambah Dokter',
            'validation' => \Config\Services::validation()
        ];

        return view('dokter/tambahdokter', $data);
    }

    public function simpan()
    {
        //validasi input data
        if (!$this->validate([
            'nama_dokter' => 'required',
            'alamat_dokter' => 'required',
            'no_tlp' => 'required',
            'jenis_poli' => 'required',
            'status' => 'required',
        ])) {

            // menampilkan pesan kesalahan
            $validation = \Config\Services::validation();
            return redirect()->to('/dokter/tambah')->withInput()->with('validation', $validation);
        }

        $pengguna = new DataPenggunaModel();
        $data = [
            'nama' => $this->request->getVar('nama_dokter'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'hak_akses' => 'dokter'
        ];

        $pengguna->insert($data);
        $id_pengguna = $pengguna->getInsertID();

        $this->DokterModel->insert([
            'id_pengguna' => $id_pengguna,
            'nama_dokter' => $this->request->getVar('nama_dokter'),
            'alamat_dokter' => $this->request->getVar('alamat_dokter'),
            'no_tlp' => $this->request->getVar('no_tlp'),
            'jenis_poli' => $this->request->getVar('jenis_poli'),
            'status' => $this->request->getVar('status')
        ]);

        //flasdata pesan simpan data
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/dokter');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail dokter';
        $data['dokter'] = $this->DokterModel->getDokter($id);
        $data['listJadwal'] = $this->JadwalModel->where('jadwal_dokter.id_dokter', $id)->join('dokter', 'dokter.id_dokter = jadwal_dokter.id_dokter')->findAll();
        return view('dokter/detaildokter', $data);
    }

    public function editdokter($iddokter)
    {
        $data = [
            'title' => 'Edit Dokter',
            'validation' => \Config\Services::validation(),
            'listdokter' => $this->DokterModel->getDokter($iddokter)
        ];

        return view('Dokter/editdokter', $data);
    }

    public function update($iddokter)
    {

        $this->DokterModel->update($iddokter, [
            'nama_dokter' => $this->request->getPost('nama_dokter'),
            'alamat_dokter' => $this->request->getPost('alamat_dokter'),
            'no_tlp' => $this->request->getPost('no_tlp'),
            'jenis_poli' => $this->request->getPost('jenis_poli'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('/dokter');
    }

    public function hapus($iddokter)
    {
        $this->DokterModel->delete(['id_dokter' => $iddokter]);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/dokter');
    }
}
