<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasienModel;
use App\Models\RmModel;
use Dompdf\Dompdf;

class Pasien extends BaseController
{
    public function __construct()
    {
        $this->PasienModel = new PasienModel();
        $this->RmModel = new RmModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pasien',
            'listpasien' => $this->PasienModel->getPasien()
        ];

        return view('pasien/listpasien', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pasien';
        $data['pasien'] = $this->PasienModel->getPasien($id);
        $data['listRm'] = $this->RmModel->where('id_pasien', $id)->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter')->findAll();
        return view('pasien/detailpasien', $data);
    }
    public function simpan()
    {
        //validasi input data
        if (!$this->validate([
            'id_pasien' => [
                'rules' => 'required|is_unique[pasien.id_pasien]',
                'errors' => [
                    'required' => '{field} id_harus diisi harus diisi',
                    'is_unique' => '{field} id sudah ada'
                ]
            ]
        ])) {

            // menampilkan pesan kesalahan
            $validation = \Config\Services::validation();

            return redirect()->to('/Pasien/tambah')->withInput()->with('validation', $validation);
        }
        $this->PasienModel->insert([
            'id_pasien' => $this->request->getVar('id_pasien'),
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jekel' => $this->request->getVar('jekel'),
            'nama_kk' => $this->request->getVar('nama_kk'),
            'alamat_pasien' => $this->request->getVar('alamat_pasien'),
            'nama_poli' => $this->request->getVar('nama_poli')
        ]);

        //flasdata pesan simpan data
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/pasien');
    }
    public function tambah()
    {
        session();
        $data = [
            'title' => 'Simpan Pasien',
            'validation' => \Config\Services::validation()
        ];

        return view('pasien/tambah', $data);
    }

    public function hapus($idpasien)
    {
        $this->PasienModel->delete(['id_pasien' => $idpasien]);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/pasien');
    }

    public function editpasien($idpasien)
    {
        $data = [
            'title' => 'Edit Pasien',
            'validation' => \Config\Services::validation(),
            'listpasien' => $this->PasienModel->getPasien($idpasien)
        ];

        return view('Pasien/editpasien', $data);
    }
    public function update($idpasien)
    {

        $this->PasienModel->update($idpasien, [
            'id_pasien' => $this->request->getPost('id_pasien'),
            'nama_pasien' => $this->request->getPost('nama_pasien'),
            'jekel' => $this->request->getPost('jekel'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'nama_kk' => $this->request->getPost('nama_kk'),
            'alamat_pasien' => $this->request->getPost('alamat_pasien'),
            'nama_poli' => $this->request->getPost('nama_poli')
        ]);

        return redirect()->to('/pasien');
    }
    // public function laporan()
    // {
    //     $mpdf = new \Mpdf\mpdf();
    //     $pasien = new PasienModel();
    //     $tanggalawal = $this->request->getVar('tanggalawal');
    //     $tanggalakhir = $this->request->getVar('tanggalakhir');
    //     $pasien = $pasien->cari($tanggalawal, $tanggalakhir);

    //     $data = [
    //         'judul' => 'Laporan Penjualan',
    //         'pasien' => $this->PasienModel->getPasien()
    //     ];
    //     $html = view('/pasien/pasien_header_print', $data);
    //     $mpdf->WriteHTML($html);
    //     $mpdf->Output('Laporan Rekam Medis.pdf', 'D');
    // }

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
