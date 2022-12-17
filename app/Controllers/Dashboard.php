<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyakitModel;
use App\Models\PeriksaModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->PenyakitModel = new PenyakitModel();
        $this->PeriksaModel = new PeriksaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard utama',
            'periksa' => $this->PeriksaModel->join('pasien', 'pasien.id_pasien = periksa.id_pasien')->where('periksa.status', 'proses')->orderBy('id_periksa','asc')->findAll()
        ];
        return view('dashboard/index', $data);
    }

    public function laporan(){
        $data = [
            'title' => 'Laporan',
            'periksa' => $this->PeriksaModel->join('pasien', 'pasien.id_pasien = periksa.id_pasien')->findAll()
        ];
        return view('laporan/lap', $data);
    }
}
