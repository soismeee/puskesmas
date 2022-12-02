<?php

namespace App\Controllers;

use App\Models\DataPenggunaModel;
use App\Models\DokterModel;
use App\Models\JadwalDokterModel;
use App\Models\JadwalModel;

class jadwaldokter extends BaseController
{
    public function __construct()
    {
        $this->JadwalModel = new JadwalModel();
        $this->dokterModel = new DokterModel();
        $this->penggunaModel = new DataPenggunaModel();
        // $this->jadwalDokter = new JadwalDokterModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Jadwal Dokter',
            'listdokter' => $this->dokterModel->getDokter()
        ];

        return view('dokter/listdokter', $data);
    }
    public function simpan()
    {
        //validasi input data
        if (!$this->validate([
            'id_dokter' => [
                'rules' => 'required|is_unique[dokter.id_dokter]',
                'errors' => [
                    'required' => '{field} id_harus diisi harus diisi',
                    'is_unique' => '{field} id sudah ada'
                ]
            ]
        ])) {

            // menampilkan pesan kesalahan
            $validation = \Config\Services::validation();

            return redirect()->to('/dokter/jadwaldokter')->withInput()->with('validation', $validation);
        }
        $this->JadwalModel->insert([
            'id_dokter' => $this->request->getVar('id_dokter'),
            'nama_dokter' => $this->request->getVar('nama_dokter'),
            'alamat_dokter' => $this->request->getVar('alamat_dokter'),
            'no_tlp' => $this->request->getVar('no_tlp'),
            'jenis_poli' => $this->request->getVar('jenis_poli'),
            'jadwal' => $this->request->getVar('jadwal')
        ]);

        $this->JadwalModel->insert([
            'id_user' => $this->request->getVar('id_dokter'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'hak_akses' => 'dokter'
        ]);

        //flasdata pesan simpan data
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/jadwaldokter');
    }
    public function tambahdokter()
    {

        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'title' => 'Simpan Dokter',
            'validation' => \Config\Services::validation()
        ];

        return view('dokter/tambahdokter', $data);
    }

    public function hapus($iddokter)
    {
        $this->JadwalModel->delete(['id_dokter' => $iddokter]);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/jadwaldokter');
    }

    public function editdokter($iddokter)
    {

        $data = [
            'title' => 'Edit',
            'listdokter' => $this->JadwalModel->getJadwal($iddokter)
        ];

        return view('dokter/editdokter', $data);
    }
    public function update($iddokter)
    {

        $this->JadwalModel->update($iddokter, [
            'id_dokter' => $this->request->getPost('id_dokter'),
            'nama_dokter' => $this->request->getPost('nama_dokter'),
            'alamat_dokter' => $this->request->getPost('alamat_dokter'),
            'no_tlp' => $this->request->getPost('no_tlp'),
            'jenis_poli' => $this->request->getPost('jenis_poli'),
            'jadwal' => $this->request->getPost('jadwal'),

        ]);

        return redirect()->to('/dokter');
    }

    public function detaildokter($iddokter)
    {
        $data['dokter'] = $this->dokterModel->getDokter($iddokter);
        $data['listJadwal'] = $this->JadwalModel->where('id_dokter', $iddokter)->findAll();
        return view('dokter/detaildokter', $data);
    }
}
