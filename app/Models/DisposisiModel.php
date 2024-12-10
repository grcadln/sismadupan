<?php

namespace App\Models;

use CodeIgniter\Model;

class DisposisiModel extends Model
{
  protected $table      = 'tb_disposisi';
  protected $primaryKey = 'id_disposisi';

  protected $useAutoIncrement = true;


  protected $allowedFields = ['tgl_disposisi', 'instruksi', 'id_suratmasuk', 'id_departemen', 'status'];


  public function getDisposisi()
  {
    $query = "SELECT
      `tb_departemen`.*,
      `tb_pengguna`.`nama_lengkap`
    FROM
      `tb_departemen`
      INNER JOIN `tb_pengguna` ON `tb_pengguna`.`id_pengguna` =
    `tb_departemen`.`id_pengguna`";
    return $this->db->query($query)->getResultArray();
  }

  public function getDetailDisposisi()
  {
    $query = "SELECT
  `tb_departemen`.`nama_departemen`,
  `tb_disposisi`.*,
  `tb_suratmasuk`.`no_surat`,
  `tb_suratmasuk`.`pengirim`,
  `tb_jenissurat`.`jenis_surat`,
  `tb_pengguna`.`nama_lengkap`
FROM
  `tb_disposisi`
  INNER JOIN `tb_departemen` ON `tb_departemen`.`id_departemen` =
`tb_disposisi`.`id_departemen`
  INNER JOIN `tb_pengguna` ON `tb_pengguna`.`id_pengguna` =
`tb_departemen`.`id_pengguna`
  INNER JOIN `tb_suratmasuk` ON `tb_suratmasuk`.`id_suratmasuk` =
`tb_disposisi`.`id_suratmasuk`
  INNER JOIN `tb_jenissurat` ON `tb_jenissurat`.`id_jenissurat` =
`tb_suratmasuk`.`id_jenissurat`";
    return $this->db->query($query)->getResultArray();
  }
}
