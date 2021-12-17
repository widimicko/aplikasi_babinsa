<?php

namespace App\Models;

use CodeIgniter\Model;

class PiketModel extends Model {

    protected $table                = 'piket';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $useTimestamps        = true;

    protected $allowedFields        = ['id', 'id_babinsa', 'tanggal', 'created_at', 'updated_at'];

    public function getPiketSchedule() {
        $builder = $this->builder();
        $builder->select('piket.id as id, users.username as username, users.name as name, piket.tanggal as tanggal, piket.created_at as created_at');
        $builder->join('users', 'users.id = piket.id_babinsa');
        $builder->orderby('created_at', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getMemberPiketSchedule($id_member) {
        $builder = $this->builder();
        $builder->select('piket.id as id, users.username as username, users.name as name, piket.tanggal as tanggal, piket.created_at as created_at');
        $builder->join('users', 'users.id = piket.id_babinsa');
        $builder->where('users.id', $id_member);
        $builder->orderby('created_at', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getDetailPiket($id) {
        $builder = $this->builder();
        $builder->select('piket.id as id, users.username as username, users.name as name, piket.tanggal as tanggal, piket.created_at as created_at');
        $builder->join('users', 'users.id = piket.id_babinsa');
        $builder->where('piket.id', $id);
        $query = $builder->get();

        return $query->getResultArray();
    }

}