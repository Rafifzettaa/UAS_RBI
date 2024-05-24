<?php

namespace App\Controllers;

use App\Models\Model_user;

class User extends BaseController
{

    public function __construct()
    {
        $this->Model_user = new Model_user();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = array(
            'title' => 'Admin',
            'user' => $this->Model_user->all_data(),
            'isi' => 'user/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Add Admin',
            'isi' => 'user/v_add'
        );
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',

                    
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[admin.username]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} Sudah Ada, Input {field} Lain !!!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]|max_length[255]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'min_length' => 'Password Terlalu Pendek, Silahkan Isi Kembali!',
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi !!!',
                    'max_size' => 'Ukuran {field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib PNG, JPEG, JPG, GIF',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();

            $password = $this->request->getPost('password');
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);

            $data = array(
                'nama_admin' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'password' => $passwordhash,
                'foto' => $nama_file,
            );

            $foto->move('foto', $nama_file);
            $this->Model_user->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
            return redirect()->to(base_url('user'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/add'))->withInput();
        }
    }

    public function edit($id_admin)
    {
        $data = array(
            'title' => 'Edit Admin',
            'user' => $this->Model_user->detail_data($id_admin),
            'isi' => 'user/v_edit'
        );
        return view('layout/v_wrapper', $data);
    }

    public function update($id_admin)
    {
        if ($this->validate([
            'nama_admin' => [
                'label' => 'Nama Admin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib PNG, JPEG, JPG, GIF',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = array(
                    'id_admin' => $id_admin,
                    'nama_admin' => $this->request->getPost('nama_admin'),
                    'password' => $this->request->getPost('password'),
                );
                $this->Model_user->edit($data);
            } else {
                $user = $this->Model_user->detail_data($id_admin);
                if ($user['foto'] != "") {
                    unlink('foto/' . $user['foto']);
                }
                $nama_file = $foto->getRandomName();
                $data = array(
                    'id_admin' => $id_admin,
                    'nama_admin' => $this->request->getPost('nama_admin'),
                    'password' => $this->request->getPost('password'),
                    'foto' => $nama_file,
                );
                $foto->move('foto', $nama_file);
                $this->Model_user->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!!');
            return redirect()->to(base_url('user'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/edit/' . $id_admin))->withInput();
        }
    }

    public function delete($id_admin)
    {
        $user = $this->Model_user->detail_data($id_admin);
        if (!empty($user['foto']) && file_exists('foto/' . $user['foto'])) {
            unlink('foto/' . $user['foto']);
        }
        

        $data = array(
            'id_admin' => $id_admin,
        );
        $this->Model_user->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!!');
        return redirect()->to(base_url('user'));
    }
}
