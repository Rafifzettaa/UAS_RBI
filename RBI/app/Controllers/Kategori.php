<?php

namespace App\Controllers;

use App\Models\Model_kategori;

class Kategori extends BaseController
{

    public function __construct()
    {
        // Menginisialisasi model Model_kategori untuk digunakan dalam kelas ini
        $this->Model_kategori = new Model_kategori();
        
        // Memuat helper 'form' untuk digunakan dalam kelas ini
        helper('form');
    }

    public function index()
    {
        // Data yang akan dikirimkan ke view 'v_kategori'
        $data = array(
            'title' => 'Category', // Judul halaman
            'kategori' => $this->Model_kategori->all_data(), // Mendapatkan semua data kategori dari model
            'isi'    => 'v_kategori' // Isi konten yang akan dimuat ke dalam wrapper
        );
        // Menampilkan view 'layout/v_wrapper' dengan data yang sudah ditentukan
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        // Mengambil data nama_kategori dari form input
        $data = array('nama_kategori' => $this->request->getPost('nama_kategori'));
        
        // Menambahkan data kategori ke dalam database melalui model
        $this->Model_kategori->add($data);
        
        // Set flashdata pesan berhasil dan redirect kembali ke halaman kategori
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('kategori'));
    }

    public function edit($id_kategori)
    {
        // Mengambil data nama_kategori dari form input
        $data = array(
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        );
        
        // Mengedit data kategori dalam database melalui model
        $this->Model_kategori->edit($data);
        
        // Set flashdata pesan berhasil dan redirect kembali ke halaman kategori
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('kategori'));
    }

    public function delete($id_kategori)
    {
        // Data id_kategori yang akan dihapus
        $data = array(
            'id_kategori' => $id_kategori,
        );
        
        // Menghapus data kategori dari database melalui model
        $this->Model_kategori->delete_data($data);
        
        // Set flashdata pesan berhasil dan redirect kembali ke halaman kategori
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('kategori'));
    }
    //--------------------------------------------------------------------

}
