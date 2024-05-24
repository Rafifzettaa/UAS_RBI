<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pasien extends Model
{
    public function all_data()
    {
        return $this->db->table('pasien')
            ->orderBy('id_pasien', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('pasien')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('pasien')
            ->where('id_pasien', $data['id_pasien'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('pasien')
            ->where('id_pasien', $data['id_pasien'])
            ->delete($data);
    }
}
