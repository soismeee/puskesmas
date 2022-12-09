<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyakitModel;
use App\Models\RmModel;
use Dompdf\Dompdf;

class Penyakit extends BaseController
{
    public function __construct()
    {
        $this->PenyakitModel = new PenyakitModel();
        $this->RmModel = new RmModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Penyakit',
            'listpenyakit' => $this->PenyakitModel->getPenyakit()
        ];

        return view('penyakit/listpenyakit', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pasien';
        $data['penyakit'] = $this->PenyakitModel->getPenyakit($id);
        $data['listRm'] = $this->RmModel->where('id_pasien', $id)->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter')->findAll();
        return view('pasien/detailpenyakit', $data);
    }
    
    public function simpan()
    {
        //validasi input data
        if (!$this->validate([
            'nama_penyakit' => 'required',
            'ket_penyakit' => 'required',
        ])) {

            // menampilkan pesan kesalahan
            $validation = \Config\Services::validation();
            return redirect()->to('/penyakit/tambah')->withInput()->with('validation', $validation);
        }
        $this->PasienModel->insert([
            'nama_penyakit' => $this->request->getVar('nama_penyakit'),
            'ket_penyakit' => $this->request->getVar('ket_penyakit')
        ]);

        //flasdata pesan simpan data
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/penyakit');
    }
    
    public function tambah()
    {
        session();
        $data = [
            'title' => 'Simpan Penyakit',
            'validation' => \Config\Services::validation()
        ];

        return view('penyakit/tambahpenyakit', $data);
    }

    public function hapus($idpenyakit)
    {
        $this->PenyakitModel->delete(['id_penyakit' => $idpenyakit]);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/penyakit');
    }

    public function editpasien($idpenyakit)
    {
        $data = [
            'title' => 'Edit Penyakit',
            'validation' => \Config\Services::validation(),
            'listpenyakit' => $this->PenyakitModel->getPasien($idpenyakit)
        ];

        return view('penyakit/editpenyakit', $data);
    }
    
    public function update($idpasien)
    {

        $this->PasienModel->update($idpasien, [
            'nama_penyakit' => $this->request->getPost('nama_penyakit'),
            'ket_penyakit' => $this->request->getPost('ket_penyakit'),
        ]);

        session()->setFlashdata('pesan', 'Data Sudah Berhasil diubah');
        return redirect()->to('/penyakit');
    }

    public function print($idPasien)
    {
        $pasien = $this->PasienModel->getPasien($idPasien);

        $filename = date('y-m-d-H-i-s') . '-rekam medis pasien ' . $pasien['nama_pasien'];

        $data = [
            'pasien' => $pasien,
            'filename' => $filename
        ];
        $data['listRm'] = $this->RmModel->where('id_pasien', $idPasien)->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter')->findAll();

        $dompdf =  new Dompdf();

        $dompdf->loadHtml(view('pasien/print', $data));

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream($filename);
    }
}
