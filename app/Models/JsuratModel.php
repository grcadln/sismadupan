<?php

namespace App\Models;

use CodeIgniter\Model;

class JsuratModel extends Model
{
    protected $table      = 'tb_jenissurat';
    protected $primaryKey = 'id_jenissurat';

    protected $useAutoIncrement = true;


    protected $allowedFields = ['jenis_surat'];
}
