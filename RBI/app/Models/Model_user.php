<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_user extends Model
{
    protected $table = 'admin';  // Nama tabel yang digunakan
    protected $primaryKey = 'id_admin';  // Kunci primer tabel
    protected $allowedFields = ['nama_admin', 'username', 'password', 'foto'];  // Kolom yang diizinkan untuk dioperasikan

    public function all_data()
    {
        return $this->orderBy('id_admin', 'DESC')->findAll();
    }

    public function detail_data($id_admin)
    {
        return $this->find($id_admin);
    }

    public function add($data)
    {
        return $this->insert($data);
    }

    public function edit($data)
    {
        return $this->update($data['id_admin'], $data);
    }

    public function delete_data($id_admin)
    {
        return $this->delete($id_admin);
    }
}
