<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStepsDataToPanduan extends Migration
{
    public function up(): void
    {
        $this->forge->addColumn('panduan', [
            'steps_data' => [
                'type' => 'LONGTEXT',
                'null' => true,
                'after' => 'konten',
            ],
        ]);
    }

    public function down(): void
    {
        $this->forge->dropColumn('panduan', 'steps_data');
    }
}
