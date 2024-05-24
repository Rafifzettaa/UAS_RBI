<?php

namespace App\Controllers;

use App\Models\Model_terapis;

class Karyawan extends BaseController
{

    public function __construct()
    {
        // Menginisialisasi model Model_dep untuk digunakan dalam kelas ini
        $this->Model_terapis = new Model_terapis();

        // Memuat helper 'form' untuk digunakan dalam kelas ini
        helper('form');
    }

    public function index()
    {
        // Data yang akan dikirimkan ke view 'v_dep'
        $data = array(
            'title' => 'Data Terapis',
            'data' => $this->Model_terapis->all_data(), // Mendapatkan semua data departemen dari model
            'isi'    => 'v_terapis' // Isi konten yang akan dimuat ke dalam wrapper
        );
        // Menampilkan view 'layout/v_wrapper' dengan data yang sudah ditentukan
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        // Mengambil data nama_dep dari form input
        $data = array('nama_dep' => $this->request->getPost('nama_dep'));

        // Menambahkan data departemen ke dalam database melalui model
        $this->Model_dep->add($data);

        // Set flashdata pesan berhasil dan redirect kembali ke halaman departemen
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('dep'));
    }

    public function edit($id_dep)
    {
        // Mengambil data nama_dep dari form input
        $data = array(
            'id_dep' => $id_dep,
            'nama_dep' => $this->request->getPost('nama_dep'),
        );

        // Mengedit data departemen dalam database melalui model
        $this->Model_dep->edit($data);

        // Set flashdata pesan berhasil dan redirect kembali ke halaman departemen
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('dep'));
    }

    public function delete($id_dep)
    {
        // Data id_dep yang akan dihapus
        $data = array(
            'id_dep' => $id_dep,
        );

        // Menghapus data departemen dari database melalui model
        $this->Model_dep->delete_data($data);

        // Set flashdata pesan berhasil dan redirect kembali ke halaman departemen
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('dep'));
    }
    //--------------------------------------------------------------------

}