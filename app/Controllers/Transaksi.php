<?php

namespace App\Controllers;

use App\Models\Model_pasien;
use App\Models\Model_layanan;
use App\Models\Model_transaksi;
use App\Models\Model_terapis;

class Transaksi extends BaseController
{

    public function __construct()
    {
        // $this->Model_arsip = new Model_arsip();
        $this->Model_layanan = new Model_layanan();
        $this->Model_pasien = new Model_pasien();
        $this->Model_transaksi = new Model_transaksi();
        $this->Model_terapis = new Model_terapis();
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
            'title' => 'Tambah Data Transaksi',
            'kategori' => $this->Model_layanan->all_data(),
            'pasien' => $this->Model_pasien->all_data(),
            'terapis' => $this->Model_terapis->all_data(),
            'isi'    => 'arsip/v_add'
        );
        return view('layout/v_wrapper', $data);
    }
    //--------------------------------------------------------------------

    public function insert()
    {
        // Memasukkan data dokumen baru ke dalam database
        if ($this->validate([
            //nama field
            'jml' => [
                'label'  => 'Jumlah Layanan',
                'rules'  => 'required|integer|greater_than_equal_to[0]',
                'errors' => [ 
                    'required' => '{field} Wajib Diisi !!!',
                    'greater_than_equal_to' => '{field} harus diatas 0',
                    'integer' => '{field} harus berupa angka',
                ]
            ],
            'harga' => [
                'label'  => 'Total Harga',
                'rules'  => 'required|numeric|greater_than_equal_to[0]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'number' => '{field} harus berupa angka ',
                    'greater_than_equal_to' => '{field} tidak boleh kurang dari 0.',
                ]
            ],
            
        ])) {
            // Proses upload file dokumen
           
            // Data dokumen yang akan disimpan
            $data = array(
                'id_pasien' => $this->request->getPost('id_pasien'),
                'id_layanan' => $this->request->getPost('id_layanan'),
                'id_terapis' => $this->request->getPost('id_terapis'),
                'tanggal_transaksi' => $this->request->getPost('tgl_transaksi'),
                'jumlah' => $this->request->getPost('jml'),
                'total_harga' => $this->request->getPost('harga'),
                'create_at' => date('Y-m-d H:i:s'),
             );

            $this->Model_transaksi->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
            return redirect()->to(base_url('transaksi'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('transaksi/add'));
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

    public function delete($id_transaksi)
    {
        // Menghapus data dokumen beserta file terkait
        

        $data = array(
            'id_transaksi' => $id_transaksi,
        );
        $this->Model_transaksi->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!!');
        return redirect()->to(base_url('transaksi'));
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