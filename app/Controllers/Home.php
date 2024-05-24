<?php

namespace App\Controllers;

use App\Models\Model_home;

class Home extends BaseController
{

	// Konstruktor
	public function __construct()
	{
		// Menginisialisasi model Model_home untuk digunakan dalam kelas ini
		$this->Model_home = new Model_home();
	}

	// Fungsi untuk halaman utama
	public function index()
	{
		// Data yang akan dikirimkan ke view 'v_home'
		$data = array(
			'title' => 'Home', // Judul halaman
			// 'tot_pasien' => $this->Model_home->tot_arsip(), // Total arsip dari model Model_home
			'tot_karyawan' => $this->Model_home->tot_karyawan(), // Total departemen dari model Model_home
			'tot_admin' => $this->Model_home->tot_admin(), // Total pengguna dari model Model_home
			'tot_layanan' => $this->Model_home->tot_layanan(), // Total kategori dari model Model_home
			'tot_transaksi' => $this->Model_home->tot_transaksi(), // Total kategori dari model Model_home
			'isi'	=> 'v_home' // Isi konten yang akan dimuat ke dalam wrapper
		);
		// Menampilkan view 'layout/v_wrapper' dengan data yang sudah ditentukan
		return view('layout/v_wrapper', $data);
	}
}
