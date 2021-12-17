<?php

namespace App\Models;

use CodeIgniter\Model;

class LampiranModel extends Model {

    protected $table                = 'lampiran';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;

    protected $allowedFields        = ['id', 'id_piket', 'lampiran'];

}