<?php

namespace App\Models;

use CodeIgniter\Model;

class SkeluarModel extends Model
{
    protected $table      = 'tb_suratkeluar';
    protected $primaryKey = 'id_suratkeluar';

    protected $useAutoIncrement = true;

    
    protected $allowedFields = ['no_surat','tgl_keluar','penerima','perihal','isi_surat','id_pengguna','id_departemen','id_jenissurat'];

   
}