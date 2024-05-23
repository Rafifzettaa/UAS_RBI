<?php

namespace App\Controllers;

use App\Models\Model_auth;

class Auth extends BaseController
{

    public function __construct()
    {
        // Memuat helper 'form' untuk digunakan dalam kelas ini
        helper('form');
        
        // Menginisialisasi model Model_auth untuk digunakan dalam kelas ini
        $this->Model_auth = new Model_auth();
    }

    public function index()
    {
        // Data yang akan dikirimkan ke view 'v_login'
        $data = array(
            'title' => 'Login',
        );
        // Menampilkan view 'v_login' dengan data yang sudah ditentukan
        return view('v_login', $data);
    }

    public function login()
    {
        if ($this->validate([
            'username' => [
                'label'  => 'username',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ]
        ])) {
            //jika valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            // Memeriksa login dengan menggunakan model Model_auth
            $cek = $this->Model_auth->login($username, $password);
            if ($cek) {
                //jika datanya cocok, set session dan redirect ke halaman home
                session()->set('log', true);
                session()->set('id_admin', $cek['id_admin']);
                session()->set('username', $cek['username']);
                session()->set('nama_admin', $cek['nama_admin']);
                // session()->set('level', $cek['level']);
                // session()->set('foto', $cek['foto']);
                // session()->set('id_dep', $cek['id_dep']);
                return redirect()->to(base_url('home'));
            } else {
                //jika data tidak cocok, set flashdata pesan dan redirect kembali ke halaman login
                session()->setFlashdata('pesan', 'Login Gagal !!!, Username Atau Password Salah !!!');
                return redirect()->to(base_url('auth/index'));
            }
        } else {
            //jika validasi gagal, set flashdata errors dan redirect kembali ke halaman login
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));
        }
    }

    public function logout()
    {
        // Menghapus session yang terkait dengan login
        session()->remove('log');
        session()->remove('nama');
        session()->remove('username');
        // session()->remove('level');
        // session()->remove('foto');

        // Set flashdata pesan logout dan redirect kembali ke halaman login
        session()->setFlashdata('pesan', 'Anda Telah Logout !!!');
        return redirect()->to(base_url('auth'));
    }
    //--------------------------------------------------------------------

}
