<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table         = 'admins';
    protected $primaryKey    = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'nama',
        'email',
        'password',
        'role',
        'status',
    ];

    protected $validationRules = [
        'nama'     => 'required|min_length[3]|max_length[100]',
        'email'    => 'required|valid_email|max_length[150]|is_unique[admins.email,id,{id}]',
        'password' => 'required|min_length[8]',
    ];

    protected $validationMessages = [
        'nama'  => ['required' => 'Nama wajib diisi.'],
        'email' => [
            'required'    => 'Email wajib diisi.',
            'valid_email' => 'Format email tidak valid.',
            'is_unique'   => 'Email sudah terdaftar.',
        ],
        'password' => ['min_length' => 'Password minimal 8 karakter.'],
    ];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    /**
     * Hash password sebelum disimpan.
     */
    protected function hashPassword(array $data): array
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);
        }

        return $data;
    }

    /**
     * Ambil admin berdasarkan email (untuk login).
     */
    public function findByEmail(string $email): array|object|null
    {
        return $this->where('email', $email)->first();
    }

    /**
     * Ambil semua admin dengan status pending.
     */
    public function getPending(): array
    {
        return $this->where('status', 'pending')->findAll();
    }

    /**
     * Statistik jumlah admin per status.
     */
    public function getStats(): array
    {
        $total   = $this->countAllResults(false);
        $aktif   = $this->where('status', 'aktif')->countAllResults(false);
        $pending = $this->where('status', 'pending')->countAllResults(false);
        $ditolak = $this->where('status', 'ditolak')->countAllResults();

        return compact('total', 'aktif', 'pending', 'ditolak');
    }
}
