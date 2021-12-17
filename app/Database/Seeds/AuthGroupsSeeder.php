<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsSeeder extends Seeder
{
    public function run()
    {
      $data = [
        [
          'id' => 1,
          'name' => 'admin',
          'description' => 'Admin Account',
        ],
        [
          'id' => 2,
          'name' => 'leader',
          'description' => 'Leader Account',
        ],
        [
          'id' => 3,
          'name' => 'member',
          'description' => 'Member Account',
        ],
      ];

      $this->db->table('auth_groups')->insertBatch($data);
    }
}
