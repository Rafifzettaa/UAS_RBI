<?php

namespace App\Controllers;

use App\Models\Model_layanan;

class Layanan extends BaseController
{

    public function __construct()
    {
        // Menginisialisasi model Model_layanan untuk digunakan dalam kelas ini
        $this->Model_layanan = new Model_layanan();

        // Memuat helper 'form' untuk digunakan dalam kelas ini
        helper('form');
    }

    public function index()
    {
        // Data yang akan dikirimkan ke view 'v_kategori'
        $data = array(
            'title' => 'Data Layanan', // Judul halaman
            'layanan' => $this->Model_layanan->all_data(), // Mendapatkan semua data kategori dari model
            'isi'    => 'v_layanan' // Isi konten yang akan dimuat ke dalam wrapper
        );
        // Menampilkan view 'layout/v_wrapper' dengan data yang sudah ditentukan
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        // Mengambil data nama_kategori dari form input
        $data = array('nama_layanan' => $this->request->getPost('nama_layanan'));
        $data = array('harga' => $this->request->getPost('harga'));

        // Menambahkan data kategori ke dalam database melalui model
        $this->Model_layanan->add($data);

        // Set flashdata pesan berhasil dan redirect kembali ke halaman kategori
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('layanan'));
    }

    public function edit($id_layanan)
    {
        // Mengambil data nama_kategori dari form input
        $data = array(
            'id_layanan' => $id_layanan,
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'harga' => $this->request->getPost('harga'),
        );

        // Mengedit data kategori dalam database melalui model
        $this->Model_layanan->edit($data);

        // Set flashdata pesan berhasil dan redirect kembali ke halaman kategori
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('layanan'));
    }

    public function delete($id_layanan)
    {
        // Data id_kategori yang akan dihapus
        $data = array(
            'id_layanan' => $id_layanan,
        );

        // Menghapus data kategori dari database melalui model
        $this->Model_layanan->delete_data($data);

        // Set flashdata pesan berhasil dan redirect kembali ke halaman kategori
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('layanan'));
    }
    //--------------------------------------------------------------------

}
