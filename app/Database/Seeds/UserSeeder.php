<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
      $data = [
        [
          'id' => 1,
          'username' => 'admin',
          'email' => 'admin@email.com',
          // Password => 'admin_sistem'
          'password_hash' => '$2y$10$FjHlWhKrbuw5YjqdxpiA7O03XiwCN5Z6EzGPoJA2h3RiiOh2/faMG',
          'name' => 'Admin',
          'reset_hash' => NULL,
          'reset_at' => NULL,
          'reset_expires' => NULL,
          'activate_hash' => NULL,
          'status' => NULL,
          'status_message' => NULL, 
          'active' => 1,
          'force_pass_reset' => 0, 
          'created_at' => '2021-09-22 04:32:37',
          'updated_at' => '2021-09-22 04:32:37',
          'deleted_at' => NULL
        ],
        [
          'id' => 2,
          'username' => 'leader',
          'email' => 'leader@email.com',
          // Password => 'admin_sistem'
          'password_hash' => '$2y$10$FjHlWhKrbuw5YjqdxpiA7O03XiwCN5Z6EzGPoJA2h3RiiOh2/faMG',
          'name' => 'Leader',
          'reset_hash' => NULL,
          'reset_at' => NULL,
          'reset_expires' => NULL,
          'activate_hash' => NULL,
          'status' => NULL,
          'status_message' => NULL, 
          'active' => 1,
          'force_pass_reset' => 0, 
          'created_at' => '2021-09-22 04:32:37',
          'updated_at' => '2021-09-22 04:32:37',
          'deleted_at' => NULL
        ],
        [
          'id' => 3,
          'username' => 'member',
          'email' => 'member@email.com',
          // Password => 'admin_sistem'
          'password_hash' => '$2y$10$FjHlWhKrbuw5YjqdxpiA7O03XiwCN5Z6EzGPoJA2h3RiiOh2/faMG',
          'name' => 'Member',
          'reset_hash' => NULL,
          'reset_at' => NULL,
          'reset_expires' => NULL,
          'activate_hash' => NULL,
          'status' => NULL,
          'status_message' => NULL, 
          'active' => 1,
          'force_pass_reset' => 0, 
          'created_at' => '2021-09-22 04:32:37',
          'updated_at' => '2021-09-22 04:32:37',
          'deleted_at' => NULL
        ],
      ];

      $this->db->table('users')->insertBatch($data);
    }
}
