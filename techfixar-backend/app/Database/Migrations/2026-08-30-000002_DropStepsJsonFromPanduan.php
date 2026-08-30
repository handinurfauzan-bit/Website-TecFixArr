<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropStepsJsonFromPanduan extends Migration
{
    public function up(): void
    {
        if (! $this->db->fieldExists('steps_json', 'panduan')) {
            return;
        }

        // Pindahkan data lama ke steps_data jika belum ada
        if ($this->db->fieldExists('steps_data', 'panduan')) {
            $this->db->query(
                'UPDATE panduan SET steps_data = steps_json WHERE (steps_data IS NULL OR steps_data = "") AND steps_json IS NOT NULL AND steps_json != ""'
            );
        }

        $this->forge->dropColumn('panduan', 'steps_json');
    }

    public function down(): void
    {
        if ($this->db->fieldExists('steps_json', 'panduan')) {
            return;
        }

        $this->forge->addColumn('panduan', [
            'steps_json' => [
                'type' => 'LONGTEXT',
                'null' => true,
                'after' => 'konten',
            ],
        ]);

        if ($this->db->fieldExists('steps_data', 'panduan')) {
            $this->db->query(
                'UPDATE panduan SET steps_json = steps_data WHERE (steps_json IS NULL OR steps_json = "") AND steps_data IS NOT NULL AND steps_data != ""'
            );
        }
    }
}
