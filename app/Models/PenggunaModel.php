<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'tb_pengguna'; // Nama tabel
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = ['nama_pengguna', 'kata_sandi', 'nama_lengkap', 'email', 'peran'];
}
