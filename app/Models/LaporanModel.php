<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model {

    protected $table                = 'laporan';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $useTimestamps        = true;

    protected $allowedFields        = ['id', 'id_piket', 'keterangan', 'created_at', 'updated_at'];

}