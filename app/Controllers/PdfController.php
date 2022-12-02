<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Dompdf\Dompdf;


class PdfController extends Controller
{
    public function index()
    {
        return view('print/pdf_view');
    }
    public function rekammedis()
    {
        $filename = date('y-m-d-H-i-s') . '-rekammedispasien';

        $dompdf =  new Dompdf();

        $dompdf->loadHtml(view('print/pdf_view'));

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream($filename);
    }
    public function inputTanggal()
    {
        return view('print/input_tanggal');
    }
    public function pasien()
    {
        $filename = date('y-m-d-H-i-s') . '-kartupasien';

        $dompdf =  new Dompdf();

        $dompdf->loadHtml(view('print/pdf_view'));

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream($filename);
    }
}
