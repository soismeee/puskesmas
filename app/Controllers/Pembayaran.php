<?php

namespace App\Controllers;

use App\Models\ResepModel;
use App\Models\PembayaranModel;
use App\Models\PasienModel;
use Dompdf\Dompdf;

class Pembayaran extends BaseController
{
    public function __construct()
    {
        $this->PembayaranModel = new PembayaranModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Pembayaran',
            'pembayaran' => $this->PembayaranModel->getPembayaran()
        ];

        return view('pembayaran/pembayaran', $data);
    }
    public function simpan()
    {
        //validasi input data
        if (!$this->validate([
            'id_transaksi' => [
                'rules' => 'required|is_unique[nota.id_transaksi]',
                'errors' => [
                    'required' => '{field} id_harus diisi harus diisi',
                    'is_unique' => '{field} id sudah ada'
                ]
            ]
        ])) {

            // menampilkan pesan kesalahan
            $validation = \Config\Services::validation();

            return redirect()->to('/pembayaran/tambah')->withInput()->with('validation', $validation);
        }
        $this->PembayaranModel->insert([
            'id_transaksi' => $this->request->getVar('id_transaksi'),
            'jenis_transaksi' => $this->request->getVar('jenis_transaksi'),
            'id_resep' => $this->request->getVar('id_resep'),
            'jumlah' => $this->request->getVar('jumlah'),
            'total' => $this->request->getVar('total')
        ]);

        //flasdata pesan simpan data
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/pembayaran');
    }

    public function tambah()
    {
        session();
        $data = [
            'title' => 'Simpan Pembayaran',
            'validation' => \Config\Services::validation()
        ];

        return view('pembayaran/tambah', $data);
    }

    public function cetak($idtransaksi){
        $nota = $this->PembayaranModel->getPembayaran($idtransaksi);

        $filename = date('y-m-d-H-i-s') . '-cetak-nota';

        $data = [
            'nota' => $nota,
            'filename' => $filename
        ];
        // return view('pembayaran/print', $data);

        $dompdf =  new Dompdf();
        $dompdf->loadHtml(view('resep/print', $data));
        $dompdf->setPaper(array(0,0,609.4488,935.433), 'potrait');
        $dompdf->render();
        $dompdf->stream($filename);
    }

    public function hapus($idtransaksi)
    {
        $this->PembayaranModel->delete(['id_transaksi' => $idtransaksi]);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/pembayaran');
    }

    public function edit($idtransaksi)
    {

        $data = [
            'title' => 'Edit Pembayaran',
            'pembayaran' => $this->PembayaranModel->getPembayaran($idtransaksi)
        ];

        return view('pembayaran/edit', $data);
    }
    public function update($idtransaksi)
    {

        $this->PembayaranModel->update($idtransaksi, [
            'id_transaksi' => $this->request->getPost('id_transaksi'),
            'jenis_transaksi' => $this->request->getPost('jenis_transaksi'),
            'id_resep' => $this->request->getPost('id_resep'),
            'jumlah' => $this->request->getPost('jumlah'),
            'total' => $this->request->getPost('total')
        ]);

        return redirect()->to('/pembayaran');
    }

    public function autocode(){
        return json_encode($this->PembayaranModel->generateCode());
    }

}
