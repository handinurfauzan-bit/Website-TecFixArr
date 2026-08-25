<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama'       => 'Super Admin',
                'email'      => 'superadmin@techfixar.id',
                'password'   => password_hash('admin123', PASSWORD_BCRYPT),
                'role'       => 'super_admin',
                'status'     => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('admins')->insertBatch($data);
    }
}
