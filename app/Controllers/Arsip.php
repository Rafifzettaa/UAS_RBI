<?php

namespace App\Controllers;

use App\Models\Model_arsip;
use App\Models\Model_layanan;
use App\Models\Model_transaksi;

class Arsip extends BaseController
{

    public function __construct()
    {
        // $this->Model_arsip = new Model_arsip();
        $this->Model_layanan = new Model_layanan();
        $this->Model_transaksi = new Model_transaksi();
        helper('form');
    }

    public function index()
    {
        // Menampilkan halaman utama daftar dokumen
        $data = array(
            'title' => 'Riwayat Transaksi',
            'arsip' => $this->Model_transaksi->all_data(),
            'isi'    => 'arsip/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        // Menampilkan halaman tambah dokumen
        $data = array(
            'title' => 'Tambah Dokumen',
            'kategori' => $this->Model_layanan->all_data(),
            'isi'    => 'arsip/v_add'
        );
        return view('layout/v_wrapper', $data);
    }
    //--------------------------------------------------------------------

    public function insert()
    {
        // Memasukkan data dokumen baru ke dalam database
        if ($this->validate([
            'nama_arsip' => [
                'label'  => 'Nama Dokumen',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
        ])) {
            // Proses upload file dokumen
            $file_arsip = $this->request->getFile('file_arsip');
            $nama_file = $file_arsip->getRandomName();
            $ukuran_file = $file_arsip->getSize('kb');

            // Data dokumen yang akan disimpan
            $data = array(
                'id_kategori' => $this->request->getPost('id_kategori'),
                'no_arsip' => $this->request->getPost('no_arsip'),
                'nama_arsip' => $this->request->getPost('nama_arsip'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tgl_upload' => date('Y-m-d'),
                'tgl_update' => date('Y-m-d'),
                'id_dep' => session()->get('id_dep'),
                'id_user' => session()->get('id_user'),
                'file_arsip' => $nama_file,
                'ukuran_file' => $ukuran_file,
            );

            $file_arsip->move('file_arsip', $nama_file);
            $this->Model_arsip->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
            return redirect()->to(base_url('arsip'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsip/add'));
        }
    }

    //edit
    public function edit($id_arsip)
    {
        // Menampilkan halaman edit dokumen
        $data = array(
            'title' => 'Edit Dokumen',
            'kategori' => $this->Model_kategori->all_data(),
            'arsip'    => $this->Model_arsip->detail_data($id_arsip),
            'isi'    => 'arsip/v_edit'
        );
        return view('layout/v_wrapper', $data);
    }

    public function update($id_arsip)
    {
        // Memperbarui data dokumen
        if ($this->validate([
            'nama_arsip' => [
                'label'  => 'Nama Dokumen',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
        ])) {
            $file_arsip = $this->request->getFile('file_arsip');
            if ($file_arsip->getError() == 4) {
                $data = array(
                    'id_arsip'  => $id_arsip,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'nama_arsip' => $this->request->getPost('nama_arsip'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('Y-m-d'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                );
                $this->Model_arsip->edit($data);
            } else {
                $arsip = $this->Model_arsip->detail_data($id_arsip);
                if ($arsip['file_arsip'] != "") {
                    unlink('file_arsip/' . $arsip['file_arsip']);
                }
                $nama_file = $file_arsip->getRandomName();
                $ukuran_file = $file_arsip->getSize('kb');
                $data = array(
                    'id_arsip'  => $id_arsip,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'nama_arsip' => $this->request->getPost('nama_arsip'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('Y-m-d'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                    'file_arsip' => $nama_file,
                    'ukuran_file' => $ukuran_file,
                );
                $file_arsip->move('file_arsip', $nama_file);
                $this->Model_arsip->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
            return redirect()->to(base_url('arsip'));
        } else {
            session()->setFlashdata('errors', \Config\Services\validation()->getErrors());
            return redirect()->to(base_url('arsip/edit' . $id_arsip));
        }
    }

    public function delete($id_arsip)
    {
        // Menghapus data dokumen beserta file terkait
        $arsip = $this->Model_arsip->detail_data($id_arsip);
        if ($arsip['file_arsip'] != "") {
            unlink('file_arsip/' . $arsip['file_arsip']);
        }

        $data = array(
            'id_arsip' => $id_arsip,
        );
        $this->Model_arsip->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!!');
        return redirect()->to(base_url('arsip'));
    }

    public function viewpdf($id_arsip)
    {
        // Menampilkan halaman untuk melihat dokumen dalam format PDF
        $data = array(
            'title' => 'Lihat Dokumen',
            'arsip' => $this->Model_arsip->detail_data($id_arsip),
            'isi'    => 'arsip/v_viewpdf'
        );
        return view('layout/v_wrapper', $data);
    }
}