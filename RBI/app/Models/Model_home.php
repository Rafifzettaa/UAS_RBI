<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_home extends Model
{

    public function tot_arsip()
    {
        return $this->db->table('tbl_arsip')->countAll();
    }

    public function tot_karyawan()
    {
        return $this->db->table('terapis')->countAll();
    }

    public function tot_admin()
    {
        return $this->db->table('admin')->countAll();
    }
    public function tot_layanan()
    {
        return $this->db->table('layanan')->countAll();
    }

    public function tot_transaksi()
    {
        return $this->db->table('riwayat_transaksi')->countAll();
    }
}
