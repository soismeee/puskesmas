<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyakitModel;
use App\Models\PeriksaModel;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->PenyakitModel = new PenyakitModel();
        $this->PeriksaModel = new PeriksaModel();
    }

    public function index(){
        $data = [
            'title' => 'Laporan',
            'periksa' => $this->PeriksaModel->join('pasien', 'pasien.id_pasien = periksa.id_pasien')->findAll()
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
        $periksa = $this->PeriksaModel->where("DATE_FORMAT(tanggal_periksa,'%Y-%m')", $bulan)->join('pasien', 'pasien.id_pasien = periksa.id_pasien')->findAll();

        $filename = date('y-m-d-H-i-s') . '-laporan-bulanan';

        $data = [
            'periksa' => $periksa,
            'filename' => $filename
        ];

        $dompdf =  new Dompdf();

        $dompdf->loadHtml(view('laporan/print', $data));

        $dompdf->setPaper(array(0,0,609.4488,935.433), 'potrait');

        $dompdf->render();

        $dompdf->stream($filename);
    }
}
