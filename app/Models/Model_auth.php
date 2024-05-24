<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_auth extends Model
{ 
    protected $table = 'admin'; 
    protected $allowedFields = ['username', 'password', 'nama_admin', 'foto'];

    public function login($username, $password)
    {
        // Ambil pengguna berdasarkan username
        $user = $this->where('username', $username)->first();

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                return $user; // Password cocok, kembalikan data pengguna
            } else {
                return false; // Password tidak cocok
            }
        } else {
            return false; // Pengguna tidak ditemukan
        }
    }
}

