<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DataPenggunaModel;

class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    }


    public function auth()
    {
        $session = session();
        $model = new DataPenggunaModel();
        $id_user = $this->request->getVar('id_user');
        $nama = $this->request->getVar('nama');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('id_user', $id_user)->first();
        if ($data) {
            $pass = $data['user_nama'];
            $verify_pass = nama_verify($nama, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_user'       => $data['id_user'],
                    'nama'     => $data['nama'],
                    'username'    => $data['username'],
                    'password'    => $data['password'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Wrong nama');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
