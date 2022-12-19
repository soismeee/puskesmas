<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DataPenggunaModel;
use App\Models\DokterModel;
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

    public function admin()
    {
        // halaman login
        return view('auth/login_admin');
    }

    public function auth()
    {
        $session = session();
        $model = new DataPenggunaModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                if ($data['hak_akses'] == "pasien") {
                    // kodisi dimana user yang login adalah pasien
                    $pasien = new PasienModel();
                    $dataPasien = $pasien->where("id_pengguna", $data['id_user'])->first();
                    $dataSesi = [
                        'id_user' => $data['id_user'],
                        'id_pasien' => $dataPasien['id_pasien'], // mengambil data id pasien
                        'nama' => $data['nama'],
                        'username' => $data['username'],
                        'hak_akses' => $data['hak_akses'],
                    ];
                
                }else if($data['hak_akses'] == "dokter"){
                    // kondisi dimana user yang login adalah dokter
                    $dokter = new DokterModel();
                    $dataDokter = $dokter->where("id_pengguna", $data['id_user'])->first();
                    $dataSesi = [
                        'id_user' => $data['id_user'],
                        'id_dokter' => $dataDokter['id_dokter'],
                        'nama' => $data['nama'],
                        'username' => $data['username'],
                        'hak_akses' => $data['hak_akses'],
                    ];
                }else{
                    // kondisi dimana user yang login adalah admin
                    $dataSesi = [
                        'id_user' => $data['id_user'],
                        'nama' => $data['nama'],
                        'username' => $data['username'],
                        'hak_akses' => $data['hak_akses'],
                    ];
                }
                session()->set($dataSesi);
                return redirect()->to('/dashboard');
            }else{
                $session->setFlashdata('error', 'Username atau password salah');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('error', 'Username dan password harus diisi');
            return redirect()->to('/login');
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
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
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
            'alamat_pasien' => $this->request->getVar('alamat_pasien'),
            'nama_poli' => $this->request->getVar('nama_poli'),
        ];

        $pasien->insert($data2);
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
