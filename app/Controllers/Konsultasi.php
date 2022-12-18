<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailKonsultasiModel;
use App\Models\DokterModel;
use App\Models\KonsultasiModel;
use App\Models\PasienModel;
use App\Models\PenyakitModel;
use App\Models\RmModel;
use Dompdf\Dompdf;

class Konsultasi extends BaseController
{
    public function __construct()
    {
        $this->PasienModel = new PasienModel();
        $this->RmModel = new RmModel();
        $this->DokterModel = new DokterModel();
        $this->PenyakitModel = new PenyakitModel();
        $this->KonsultasiModel = new KonsultasiModel();
        $this->DetailKonsultasiModel = new DetailKonsultasiModel();
    }

    public function index()
    {
        if(session()->get('hak_akses') == "pasien") {
            $data = [
                'title' => 'Data Konsultasi',
                'konsultasi' => $this->KonsultasiModel->where('konsultasi.id_pasien', session()->get('id_pasien'))->join('dokter', 'dokter.id_dokter = konsultasi.id_dokter')->join('pasien', 'pasien.id_pasien = konsultasi.id_pasien')->findAll()
            ];
        }elseif(session()->get('hak_akses') == "dokter"){
            $data = [
                'title' => 'Data Konsultasi',
                'konsultasi' => $this->KonsultasiModel->where('konsultasi.id_dokter', session()->get('id_dokter'))->join('dokter', 'dokter.id_dokter = konsultasi.id_dokter')->join('pasien', 'pasien.id_pasien = konsultasi.id_pasien')->findAll()
            ];
        }else{
            $data = [
                'title' => 'Data Konsultasi',
                'konsultasi' => $this->KonsultasiModel->where('konsultasi.id_dokter', session()->get('id_dokter'))->join('dokter', 'dokter.id_dokter = konsultasi.id_dokter')->join('pasien', 'pasien.id_pasien = konsultasi.id_pasien')->findAll()
            ];

        }

        return view('konsultasi/datakonsultasi', $data);
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
            'id_konsultasi' => 'required',
            'id_dokter' => 'required',
            'id_penyakit' => 'required',
            'tanggal_konsul' => 'required',
        ])) {

            // menampilkan pesan kesalahan
            $validation = \Config\Services::validation();
            return redirect()->to('/Konsultasi/tambah')->withInput()->with('validation', $validation);
        }
        $this->KonsultasiModel->insert([
            'id_konsultasi' => $this->request->getVar('id_konsultasi'),
            'id_dokter' => $this->request->getVar('id_dokter'),
            'id_penyakit' => $this->request->getVar('id_penyakit'),
            'tanggal_konsul' => $this->request->getVar('tanggal_konsul'),
            'id_pasien' => session()->get('id_pasien'),
        ]);

        //flasdata pesan simpan data
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/konsultasi/roomchat/'.$this->request->getVar('id_konsultasi'));
    }

    public function roomchat($idKonsultasi){
        $data['konsultasi'] = $this->KonsultasiModel->getKonsultasi($idKonsultasi);
        $data['chat'] = $this->DetailKonsultasiModel->getDetKonsultasi($idKonsultasi);
        return view('konsultasi/chat', $data);
    }

    public function kirimpesan(){
        if (!$this->validate([
            'id_konsultasi' => 'required',
            'pesan' => 'required',
        ])) {

            // menampilkan pesan kesalahan
            $validation = \Config\Services::validation();
            return redirect()->to('/Konsultasi')->withInput()->with('validation', $validation);
        }
        if (session()->get('hak_akses' == "pasien")) {
            $akses = "pasien";
        }else{
            $akses = "dokter";
        }
        $this->DetailKonsultasiModel->insert([
            'id_konsultasi' => $this->request->getVar('id_konsultasi'),
            'pesan' => $this->request->getVar('pesan'),
            'akses' => $akses
        ]);

        //flasdata pesan simpan data
        return redirect()->to('/konsultasi/roomchat/'.$this->request->getVar('id_konsultasi'));
    }
    
    public function tambah()
    {
        session();
        $data = [
            'title' => 'Tambah konsultasi',
            'validation' => \Config\Services::validation(),
            'dokter' => $this->DokterModel->getDokter(),
            'penyakit' => $this->PenyakitModel->getPenyakit()
        ];

        return view('konsultasi/tambahkonsultasi', $data);
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

        session()->setFlashdata('pesan', 'Data Sudah Berhasil diubah');
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

    public function autocode(){
        return json_encode($this->KonsultasiModel->generateCode());
    }
}
