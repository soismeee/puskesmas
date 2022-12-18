<?php

namespace App\Controllers;

use App\Models\ResepModel;
use App\Models\PasienModel;
use App\Models\DokterModel;
use Dompdf\Dompdf;

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
        if (session()->get('hak_akses') == "pasien") {
            $data = [
                'title' => 'Resep',
                'Resep' => $this->ResepModel->join('pasien', 'pasien.id_pasien = resep.id_pasien')->join('dokter', 'dokter.id_dokter = resep.id_dokter')->where('resep.id_pasien', session()->get('id_pasien'))->findAll()
            ];
        }elseif(session()->get('hak_akses') == "dokter"){
            $data = [
                'title' => 'Resep',
                'Resep' => $this->ResepModel->join('pasien', 'pasien.id_pasien = resep.id_pasien')->join('dokter', 'dokter.id_dokter = resep.id_dokter')->where('resep.id_dokter', session()->get('id_dokter'))->findAll()
            ];
        }else{
            $data = [
                'title' => 'Resep',
                'Resep' => $this->ResepModel->join('pasien', 'pasien.id_pasien = resep.id_pasien')->join('dokter', 'dokter.id_dokter = resep.id_dokter')->findAll()
            ];
        }

        return view('resep/resep', $data);
    }
    public function simpan()
    {
        $this->ResepModel->insert([
            'kode' => $this->request->getVar('kode'),
            'id_rm' => $this->request->getVar('id_rm'),
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

    public function cetakresep($idresep){
        // $resep = $this->ResepModel->where('kode', $idresep)->join('pasien', 'pasien.id_pasien = resep.id_pasien')->join('dokter', 'dokter.id_dokter = resep.id_dokter')->first();
        $resep = $this->ResepModel->getResep($idresep);
        $filename = date('y-m-d-H-i-s') . '-cetak-resep';

        $data = [
            'resep' => $resep,
            'filename' => $filename
        ];
        return view('resep/print', $data);

        // $dompdf =  new Dompdf();
        // $dompdf->loadHtml(view('resep/print', $data));
        // $dompdf->setPaper(array(0,0,609.4488,935.433), 'potrait');
        // $dompdf->render();
        // $dompdf->stream($filename);
    }

    public function buatpembayaran($idresep){
        session();
        $data = [
            'title' => 'Simpan Pembayaran',
            'validation' => \Config\Services::validation(),
            'resep' => $this->ResepModel->getResep($idresep)
        ];
        return view('resep/tambah_bayar', $data);
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
    public function update($kode)
    {
        $this->ResepModel->update($kode, [
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
    public function autocode(){
        return json_encode($this->ResepModel->generateCode());
    }
}
