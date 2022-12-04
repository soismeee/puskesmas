<?php

namespace App\Controllers;
use App\Models\DokterModel;

class Dokter extends BaseController
{
    public function __construct()
    {
        $this->DokterModel = new DokterModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dokter',
            'dokter' => $this->DokterModel->getDokter()
        ];
        return view('dokter/listdokter', $data);
    }
}
