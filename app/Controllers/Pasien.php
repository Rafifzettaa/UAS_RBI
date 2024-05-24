<?php

namespace App\Controllers;

use App\Models\Model_pasien;

class Pasien extends BaseController
{

    public function __construct()
    {
        // Menginisialisasi model Model_dep untuk digunakan dalam kelas ini
        $this->Model_pasien = new Model_pasien();

        // Memuat helper 'form' untuk digunakan dalam kelas ini
        helper('form');
    }

    public function index()
    {
        // Data yang akan dikirimkan ke view 'v_dep'
        $data = array(
            'title' => 'Data Pasien',
            'pasien' => $this->Model_pasien->all_data(), // Mendapatkan semua data departemen dari model
            'isi'    => 'v_pasien' // Isi konten yang akan dimuat ke dalam wrapper
        );
        // Menampilkan view 'layout/v_wrapper' dengan data yang sudah ditentukan
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        // Mengambil data nama_dep dari form input
        $data = array(
            'nama' => $this->request->getPost('nama_pasien'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal_lahir' => $this->request->getPost('tgl_lahir'),
            'no_telepon' => $this->request->getPost('nomor_tlp'),
            'usia' => $this->request->getPost('usia')
        );


        // Menambahkan data departemen ke dalam database melalui model
        $this->Model_pasien->add($data);

        // Set flashdata pesan berhasil dan redirect kembali ke halaman departemen
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('pasien'));
    }

    public function edit($id_pasien)
    {
        // Mengambil data nama_dep dari form input
        $data = array(
            'id_pasien' => $id_pasien,
            'nama' => $this->request->getPost('nama_pasien'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal_lahir' => $this->request->getPost('tgl_lahir'),
            'no_telepon' => $this->request->getPost('nomor_tlp'),
            'usia' => $this->request->getPost('usia')
        );


        // Mengedit data departemen dalam database melalui model
        $this->Model_pasien->edit($data);

        // Set flashdata pesan berhasil dan redirect kembali ke halaman departemen
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('pasien'));
    }

    public function delete($id_pasien)
    {
        // Data id_dep yang akan dihapus
        $data = array(
            'id_pasien' => $id_pasien,
        );

        // Menghapus data departemen dari database melalui model
        $this->Model_pasien->delete_data($data);

        // Set flashdata pesan berhasil dan redirect kembali ke halaman departemen
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('pasien'));
    }
    //--------------------------------------------------------------------

}
