<?php

namespace App\Models;

use CodeIgniter\Model;

class LampiranModel extends Model
{
    protected $table      = 'tb_lampiransurat';
    protected $primaryKey = 'id_lampiransurat';

    protected $useAutoIncrement = true;

    
    protected $allowedFields = ['nama_file','lokasi_file','id_suratkeluar','id_suratmasuk'];

   
}