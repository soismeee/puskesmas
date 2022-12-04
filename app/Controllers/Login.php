<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DataPenggunaModel;
use App\Models\PasienModel;

class Login extends Controller
{
    public function __construct()
    {
        // $this->DataPenggunaModel = new DataPenggunaModel();
        // $this->PasienModel = new PasienModel();
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
                $pengguna = new DataPenggunaModel();
                $dataPengguna = $pengguna->where("username", $username)->first();
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

    public function register(){
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('auth/register', $data);
    }

    public function save(){
        // dd($this->request->getVar());
        if (!$this->validate([
            'nama_pasien' => 'required',    
            'nama_kk' => 'required',
            'tanggal_lahir' => 'required',
            'jekel' => 'required',
            'alamat_pasien' => 'required',
            'username' => 'required',
            'password' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/login/register')->withInput()->with('validation', $validation);
        }

        $pengguna = new DataPenggunaModel();
        $data = [
            'nama' => $this->request->getVar('nama_pasien'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'hak_akses' => 'pasien'
        ];

        $pengguna->insert($data);
        $id_pengguna = $pengguna->getInsertID();

        $id = $id_pengguna;
        $pasien = new PasienModel();
        $data2 = [
            'id_pengguna' => $id,
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jekel' => $this->request->getVar('jekel'),
            'nama_kk' => $this->request->getVar('nama_kk'),
            'alamat_pasien' => $this->request->getVar('alamat_pasien')
        ];

        $pasien->insert($data2);
        // $this->DataPenggunaModel->insert([
        //     'nama' => $this->request->getVar('nama_pasien'),
        //     'username' => $this->request->getVar('username'),
        //     'password' => md5($this->request->getVar('password')),
        //     'hak_akses' => 'pasien'
        // ]);

        // $this->PasienModel->insert([
        //     'id_pengguna' => $id_pengguna,
        //     'nama_pasien' => $this->request->getVar('nama_pasien'),
        //     'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
        //     'jekel' => $this->request->getVar('jekel'),
        //     'nama_kk' => $this->request->getVar('nama_kk'),
        //     'alamat_pasien' => $this->request->getVar('alamat_pasien')
        // ]);
        
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
