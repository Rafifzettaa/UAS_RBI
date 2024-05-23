<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_transaksi extends Model
{
    // Mengambil semua data arsip yang sesuai dengan session id_user
    public function all_data()
    {
        return $this->db->table('riwayat_transaksi')
            ->select('riwayat_transaksi.*, pasien.nama as nama_pasien, terapis.nama_terapis, layanan.nama_layanan')
            ->join('pasien', 'pasien.id_pasien = riwayat_transaksi.id_pasien')
            ->join('terapis', 'terapis.id_terapis = riwayat_transaksi.id_terapis')
            ->join('layanan', 'layanan.id_layanan = riwayat_transaksi.id_layanan')
            ->get()
            ->getResultArray();
    }

    // Mendapatkan detail data arsip berdasarkan id_arsip
    public function detail_data($id_arsip)
    {
        return $this->db->table('tbl_arsip')
            ->join('tbl_dep', 'tbl_dep.id_dep = tbl_arsip.id_dep', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user', 'left')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori', 'left')
            ->where('id_arsip', $id_arsip)
            ->get()
            ->getRowArray();
    }

    // Menambahkan data arsip baru
    public function add($data)
    {
        $this->db->table('riwayat_transaksi')->insert($data);
    }

    // Mengedit data arsip
    public function edit($data)
    {
        $this->db->table('riwayat_transaksi')
            ->where('id_transaksi', $data['id_transaksi'])
            ->update($data);
    }

    // Menghapus data arsip
    public function delete_data($data)
    {
        $this->db->table('riwayat_transaksi')
            ->where('id_transaksi', $data['id_transaksi'])
            ->delete($data);
    }
}
