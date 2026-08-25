<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePanduanTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'kategori' => [
                'type'       => 'ENUM',
                'constraint' => ['Troubleshooting', 'Assembly', 'Tips & Trik'],
                'default'    => 'Tips & Trik',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'konten' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'alat_dibutuhkan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'jumlah_dibaca' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'admin_id' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('admin_id', 'admins', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('panduan');
    }

    public function down(): void
    {
        $this->forge->dropTable('panduan');
    }
}
