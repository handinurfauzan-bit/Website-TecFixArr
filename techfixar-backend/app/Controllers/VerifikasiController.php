<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class VerifikasiController extends Controller
{
    protected AdminModel $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        helper(['url']);
    }

    // ─────────────────────────────────────────
    // GET /admin/verifikasi
    // Halaman daftar admin + statistik
    // ─────────────────────────────────────────
    public function index(): string
    {
        // Hanya super_admin yang boleh akses
        if (session()->get('admin_role') !== 'super_admin') {
            return redirect()->to('/admin/panduan')
                             ->with('error', 'Akses ditolak. Hanya Super Admin.');
        }

        $filter = $this->request->getGet('status') ?? 'semua';
        $stats  = $this->adminModel->getStats();

        $builder = $this->adminModel->orderBy('created_at', 'DESC');

        if ($filter !== 'semua') {
            $builder->where('status', $filter);
        }

        $admins = $builder->findAll();

        return view('admin/verifikasi/index', [
            'admins' => $admins,
            'stats'  => $stats,
            'filter' => $filter,
        ]);
    }

    // ─────────────────────────────────────────
    // POST /admin/verifikasi/setujui/{id}
    // ─────────────────────────────────────────
    public function setujui(int $id)
    {
        if (session()->get('admin_role') !== 'super_admin') {
            return redirect()->to('/admin/panduan')
                             ->with('error', 'Akses ditolak.');
        }

        $admin = $this->adminModel->find($id);

        if (! $admin) {
            return redirect()->back()->with('error', 'Admin tidak ditemukan.');
        }

        if ($admin['status'] !== 'pending') {
            return redirect()->back()->with('error', 'Admin ini tidak dalam status pending.');
        }

        $this->adminModel->update($id, ['status' => 'aktif']);

        return redirect()->to('/admin/verifikasi')
                         ->with('success', "Admin '{$admin['nama']}' berhasil disetujui.");
    }

    // ─────────────────────────────────────────
    // POST /admin/verifikasi/tolak/{id}
    // ─────────────────────────────────────────
    public function tolak(int $id)
    {
        if (session()->get('admin_role') !== 'super_admin') {
            return redirect()->to('/admin/panduan')
                             ->with('error', 'Akses ditolak.');
        }

        $admin = $this->adminModel->find($id);

        if (! $admin) {
            return redirect()->back()->with('error', 'Admin tidak ditemukan.');
        }

        if ($admin['status'] !== 'pending') {
            return redirect()->back()->with('error', 'Admin ini tidak dalam status pending.');
        }

        $this->adminModel->update($id, ['status' => 'ditolak']);

        return redirect()->to('/admin/verifikasi')
                         ->with('success', "Admin '{$admin['nama']}' berhasil ditolak.");
    }

    // ─────────────────────────────────────────
    // POST /admin/verifikasi/hapus/{id}
    // Hapus akun admin (hanya super_admin)
    // ─────────────────────────────────────────
    public function hapus(int $id)
    {
        if (session()->get('admin_role') !== 'super_admin') {
            return redirect()->to('/admin/panduan')
                             ->with('error', 'Akses ditolak.');
        }

        // Lindungi super_admin dari penghapusan diri sendiri
        if ($id === (int) session()->get('admin_id')) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus akun Anda sendiri.');
        }

        $admin = $this->adminModel->find($id);

        if (! $admin) {
            return redirect()->back()->with('error', 'Admin tidak ditemukan.');
        }

        $this->adminModel->delete($id);

        return redirect()->to('/admin/verifikasi')
                         ->with('success', "Akun '{$admin['nama']}' berhasil dihapus.");
    }
}
