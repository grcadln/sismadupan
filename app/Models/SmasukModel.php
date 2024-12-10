<?php

namespace App\Models;

use CodeIgniter\Model;

class SmasukModel extends Model
{
    protected $table      = 'tb_suratmasuk';
    protected $primaryKey = 'id_suratmasuk';
 
    protected $useAutoIncrement = true;

    
    protected $allowedFields = ['no_surat','tgl_terima','pengirim','isi_surat','id_pengguna','id_departemen','id_jenissurat'];


    public function getSuratMasuk(){
        $query = "SELECT
                    `tb_jenissurat`.`jenis_surat`,
                    `tb_suratmasuk`.*
                  FROM
                    `tb_jenissurat`
                  INNER JOIN `tb_suratmasuk` 
                  ON `tb_jenissurat`.`id_jenissurat` = `tb_suratmasuk`.`id_jenissurat`";
       return $this->db->query($query)->getResultArray();
    }
    
    
    
}