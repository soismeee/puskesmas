<?php

namespace App\Controllers;

use App\Models\DokterModel;
use App\Models\PasienModel;
use App\Models\PeriksaModel;

class periksa extends BaseController
{
    public function __construct()
    {
        $this->periksaModel = new periksaModel();
        $this->PenggunaModel = new PeriksaModel();
        $this->PasienModel = new PasienModel();
        $this->DokterModel = new DokterModel();
    }
    public function index()
    {
        $session = session();
        if($session->get('hak_akses') == "admin"){
            $data = [
                'title' => 'Periksa',
                'button' => 1,
                'periksa' => $this->periksaModel->join('pasien', 'pasien.id_pasien = periksa.id_pasien')->where('status', 'proses')->findAll()
            ];    
        }else{
            $data = [
                'title' => 'Periksa',
                'button' => 1,
                'periksa' => $this->periksaModel->join('pasien', 'pasien.id_pasien = periksa.id_pasien')->where('status', 'proses')->where('periksa.id_pasien', $session->get('id_user'))->findAll()
            ];
        }
        
        return view('periksa/periksa', $data);
    }

    public function selesai(){
        $session = session();
        if($session->get('hak_akses') == "admin"){
            $data = [
                'title' => 'Periksa',
                'button' => 0,
                'periksa' => $this->periksaModel->join('pasien', 'pasien.id_pasien = periksa.id_pasien')->where('status', 'selesai')->findAll()
            ];    
        }else{
            $data = [
                'title' => 'Periksa',
                'button' => 0,
                'periksa' => $this->periksaModel->join('pasien', 'pasien.id_pasien = periksa.id_pasien')->where('status', 'selesai')->where('periksa.id_pasien', $session->get('id_user'))->findAll()
            ];
        }

        return view('periksa/periksa', $data);
    }

    public function detailperiksa($idperiksa)
    {
        $data = [
            'title' => 'Detail periksa',
            'periksa' => $this->periksaModel->getPeriksa($idperiksa)
        ];
        return view('periksa/detailperiksa', $data);
    }

    public function simpan()
    {
        //validasi input data
        if (!$this->validate([
            'id_pasien' => [
                'rules' => 'required|is_unique[periksa.id_periksa]',
                'errors' => [
                    'required' => '{field} id_harus diisi harus diisi',
                    'is_unique' => '{field} id sudah ada'
                ]
            ],
            'tanggal_periksa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} id_harus diisi harus diisi',
                ],
            ],
            'shift' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} id_harus diisi harus diisi',
                ],
            ],
            'nama_poli_periksa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} id_harus diisi harus diisi',
                ],
            ],
        ])) {

            // menampilkan pesan kesalahan
            $validation = \Config\Services::validation();

            return redirect()->to('/periksa/tambahperiksa')->withInput()->with('validation', $validation);
        }
        $this->periksaModel->insert([
            'id_pasien' => $this->request->getVar('id_pasien'),
            'tanggal_periksa' => $this->request->getVar('tanggal_periksa'),
            'waktu_daftar' => date('Y-m-d h:i:sa'),
            'shift' => $this->request->getVar('shift'),
            'nama_poli_periksa' => $this->request->getVar('nama_poli_periksa'),
            // 'nama_poli_periksa' => $this->request->getVar('nama_poli_periksa')
        ]);

        // $this->PenggunaModel->insert([
        //     'id_user' => $this->request->getVar('id_periksa'),
        //     ''
        // ]);

        //flasdata pesan simpan data
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/periksa');
    }

    public function tambahperiksa()
    {

        session();

        $data = [
            'title' => 'Simpan periksa',
            'validation' => \Config\Services::validation(),
            'listPasien' => $this->PasienModel->findAll()
        ];

        return view('periksa/tambahperiksa', $data);
    }

    public function hapus($idperiksa)
    {
        $this->periksaModel->delete(['id_periksa' => $idperiksa]);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/periksa');
    }

    public function editperiksa($idperiksa)
    {

        $data = [
            'title' => 'Edit periksa',
            'periksa' => $this->periksaModel->getPeriksa($idperiksa)
        ];
        // var_dump($data);
        return view('periksa/editperiksa', $data);
    }

    public function update($idperiksa)
    {
        $this->periksaModel->update($idperiksa, [
            'tanggal_periksa' => $this->request->getPost('tanggal_periksa'),
            'waktu_daftar' => $this->request->getPost('waktu_daftar'),
            'nama_poli_periksa' => $this->request->getPost('nama_poli_periksa'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('/periksa/selesai');
    }

    public function createrm($idperiksa){
        session();
        $data = [
            'title' => 'Simpan Rekam Medis',
            'validation' => \Config\Services::validation(),
            'periksa' => $this->periksaModel->getPeriksa($idperiksa),
            'listDokter'   => $this->DokterModel->getDokter()
        ];

        return view('periksa/tambahrm', $data);
    }
}
