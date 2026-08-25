<?php

namespace App\Models;

use CodeIgniter\Model;

class PanduanModel extends Model
{
    protected $table         = 'panduan';
    protected $primaryKey    = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'judul',
        'kategori',
        'deskripsi',
        'konten',
        'alat_dibutuhkan',
        'jumlah_dibaca',
        'admin_id',
    ];

    protected $validationRules = [
        'judul'    => 'required|min_length[5]|max_length[255]',
        'kategori' => 'required|in_list[Troubleshooting,Assembly,Tips & Trik]',
        'deskripsi'=> 'permit_empty|max_length[500]',
        'konten'   => 'required',
    ];

    protected $validationMessages = [
        'judul'    => ['required' => 'Judul wajib diisi.'],
        'kategori' => ['required' => 'Kategori wajib dipilih.'],
        'konten'   => ['required' => 'Konten panduan wajib diisi.'],
    ];

    /**
     * Ambil panduan dengan join nama admin.
     */
    public function getPanduanWithAdmin(?string $kategori = null, int $perPage = 6): array
    {
        $builder = $this->select('panduan.*, admins.nama as nama_admin')
                        ->join('admins', 'admins.id = panduan.admin_id', 'left');

        if ($kategori && $kategori !== 'Semua') {
            $builder->where('panduan.kategori', $kategori);
        }

        return $builder->orderBy('panduan.created_at', 'DESC')
                       ->paginate($perPage);
    }

    /**
     * Hitung jumlah panduan per kategori.
     */
    public function getCountByKategori(): array
    {
        $result = [];
        $rows   = $this->select('kategori, COUNT(*) as jumlah')
                       ->groupBy('kategori')
                       ->findAll();

        foreach ($rows as $row) {
            $result[$row['kategori']] = $row['jumlah'];
        }

        return $result;
    }

    /**
     * Tambah jumlah baca.
     */
    public function tambahBaca(int $id): void
    {
        $this->set('jumlah_dibaca', 'jumlah_dibaca + 1', false)
             ->where('id', $id)
             ->update();
    }
}
