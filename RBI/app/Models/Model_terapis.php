<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_terapis extends Model
{
    public function all_data()
    {
        return $this->db->table('terapis')
            ->orderBy('id_terapis', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('terapis')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('terapis')
            ->where('id_terapis', $data['id_terapis'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('terapis')
            ->where('id_terapis', $data['id_terapis'])
            ->delete($data);
    }
}
