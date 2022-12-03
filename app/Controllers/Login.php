<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DataPenggunaModel;

class Login extends Controller
{
    public function __construct()
    {
        $this->DataPenggunaModel = new DataPenggunaModel();
    }

    public function index()
    {
        // halaman login
        
        return view('auth/login');
    }


    public function auth()
    {
        $login = $this->request->getVar('login');
        if ($login) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            if ($username == '' or $password == '') {
                $err = "username dan password harus diisi !!";
            }

            if (empty($err)) {
                $dataPengguna = $this->DataPenggunaModel->where("username", $username)->first();
                if ($dataPengguna['password'] != md5($password)) {
                    $err = "Username atau password salah!!";
                }
            }

            if (empty($err)) {
                $dataSesi = [
                    'id_user' => $dataPengguna['id_user'],
                    'nama' => $dataPengguna['nama'],
                    'username' => $dataPengguna['username'],
                    'hak_akses' => $dataPengguna['hak_akses'],
                ];
                session()->set($dataSesi);
                return redirect()->to('Dashboard');
            }

            if ($err) {
                session()->setFlashdata('username', $username);
                session()->setFlashdata('error', $err);
                return redirect()->to("login");
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
