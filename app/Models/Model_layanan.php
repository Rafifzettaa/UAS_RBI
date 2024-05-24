<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_layanan extends Model
{
    public function all_data()
    {
        return $this->db->table('layanan')
            ->orderBy('id_layanan', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('layanan')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('layanan')
            ->where('id_layanan', $data['id_layanan'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('layanan')
            ->where('id_layanan', $data['id_layanan'])
            ->delete($data);
    }
}
