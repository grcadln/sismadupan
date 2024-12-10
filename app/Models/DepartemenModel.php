<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartemenModel extends Model
{
    protected $table      = 'tb_departemen';
    protected $primaryKey = 'id_departemen';

    protected $useAutoIncrement = true;


    protected $allowedFields = ['nama_departemen', 'id_pengguna'];



    public function getDepartemen()
    {
        $query = "SELECT
                `tb_departemen`.*,
                `tb_pengguna`.`nama_lengkap`
                FROM
                `tb_pengguna`
                INNER JOIN `tb_departemen` ON `tb_pengguna`.`id_pengguna` =
                `tb_departemen`.`id_pengguna`";
        return $this->db->query($query)->getResultArray();
    }
}
