<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyakitModel;
use App\Models\PeriksaModel;
use App\Models\RmModel;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->PenyakitModel = new PenyakitModel();
        $this->PeriksaModel = new PeriksaModel();
        $this->RmModel = new RmModel();
    }

    public function index(){
        $penyakit = $this->PenyakitModel->getPenyakit();
        foreach ($penyakit as $key) {
            $datas[] = [
                'id_penyakit' => $key['id_penyakit'],
                'nama_penyakit' => $key['nama_penyakit'],
                'jml_kasus' => $this->RmModel->where('diagnosa', $key['id_penyakit'])->countAllResults()
            ];
        }

        $data = [
            'title' => 'Laporan',
            'listpenyakit' => $datas
        ];
        return view('laporan/lap', $data);
    }

    public function bulan(){
        if (!$this->validate([
            'bulan' => 'required'
        ])) {

            // menampilkan pesan kesalahan
            $validation = \Config\Services::validation();
            return redirect()->to('/laporan')->withInput()->with('validation', $validation);
        }
        $bulan = $this->request->getVar('bulan');

        $penyakit = $this->PenyakitModel->getPenyakit();
        foreach ($penyakit as $key) {
            $datas[] = [
                'id_penyakit' => $key['id_penyakit'],
                'nama_penyakit' => $key['nama_penyakit'],
                'jml_kasus' => $this->RmModel->where('diagnosa', $key['id_penyakit'])->where("DATE_FORMAT(tanggal_periksa,'%Y-%m')", $bulan)->countAllResults()
            ];
        }

        $filename = date('y-m-d-H-i-s') . '-laporan-bulanan';

        $data = [
            'listpenyakit' => $datas,
            'filename' => $filename
        ];

        $dompdf =  new Dompdf();

        $dompdf->loadHtml(view('laporan/print', $data));

        $dompdf->setPaper(array(0,0,609.4488,935.433), 'potrait');

        $dompdf->render();

        $dompdf->stream($filename);
    }
}
