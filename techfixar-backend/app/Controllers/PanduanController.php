<?php

namespace App\Controllers;

use App\Models\PanduanModel;
use CodeIgniter\Controller;

class PanduanController extends Controller
{
    protected PanduanModel $panduanModel;

    public function __construct()
    {
        $this->panduanModel = new PanduanModel();
        helper(['form', 'url']);
    }

    // ─────────────────────────────────────────
    // GET /admin/panduan
    // Halaman kelola panduan dengan filter & pagination
    // ─────────────────────────────────────────
    public function index(): string
    {
        $kategori = $this->request->getGet('kategori') ?? 'Semua';
        $perPage  = 6;

        $panduan      = $this->panduanModel->getPanduanWithAdmin($kategori, $perPage);
        $pager        = $this->panduanModel->pager;
        $countByKat   = $this->panduanModel->getCountByKategori();
        $total        = array_sum($countByKat);

        return view('admin/panduan/index', [
            'panduan'     => $panduan,
            'pager'       => $pager,
            'countByKat'  => $countByKat,
            'total'       => $total,
            'aktifFilter' => $kategori,
        ]);
    }

    // ─────────────────────────────────────────
    // GET /admin/panduan/baru
    // ─────────────────────────────────────────
    public function baru(): string
    {
        return view('admin/panduan/baru');
    }

    // ─────────────────────────────────────────
    // POST /admin/panduan/simpan
    // ─────────────────────────────────────────
    public function simpan()
    {
        if (! $this->panduanModel->validate($this->request->getPost())) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $this->panduanModel->errors());
        }

        $this->panduanModel->save([
            'judul'           => $this->request->getPost('judul'),
            'kategori'        => $this->request->getPost('kategori'),
            'deskripsi'       => $this->request->getPost('deskripsi'),
            'konten'          => $this->request->getPost('konten'),
            'alat_dibutuhkan' => $this->request->getPost('alat_dibutuhkan'),
            'admin_id'        => session()->get('admin_id'),
        ]);

        return redirect()->to('/admin/panduan')
                         ->with('success', 'Panduan berhasil ditambahkan.');
    }

    // ─────────────────────────────────────────
    // GET /admin/panduan/edit/{id}
    // ─────────────────────────────────────────
    public function edit(int $id): string
    {
        $panduan = $this->panduanModel->find($id);

        if (! $panduan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Panduan #$id tidak ditemukan.");
        }

        return view('admin/panduan/edit', ['panduan' => $panduan]);
    }

    // ─────────────────────────────────────────
    // POST /admin/panduan/update/{id}
    // ─────────────────────────────────────────
    public function update(int $id)
    {
        $panduan = $this->panduanModel->find($id);

        if (! $panduan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Panduan #$id tidak ditemukan.");
        }

        // Skip is_unique rule untuk update
        $this->panduanModel->setValidationRule('judul', 'required|min_length[5]|max_length[255]');

        if (! $this->panduanModel->validate($this->request->getPost())) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $this->panduanModel->errors());
        }

        $this->panduanModel->update($id, [
            'judul'           => $this->request->getPost('judul'),
            'kategori'        => $this->request->getPost('kategori'),
            'deskripsi'       => $this->request->getPost('deskripsi'),
            'konten'          => $this->request->getPost('konten'),
            'alat_dibutuhkan' => $this->request->getPost('alat_dibutuhkan'),
        ]);

        return redirect()->to('/admin/panduan')
                         ->with('success', 'Panduan berhasil diperbarui.');
    }

    // ─────────────────────────────────────────
    // POST /admin/panduan/hapus/{id}
    // ─────────────────────────────────────────
    public function hapus(int $id)
    {
        $panduan = $this->panduanModel->find($id);

        if (! $panduan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Panduan #$id tidak ditemukan.");
        }

        $this->panduanModel->delete($id);

        return redirect()->to('/admin/panduan')
                         ->with('success', 'Panduan berhasil dihapus.');
    }

    // ─────────────────────────────────────────
    // GET /panduan (halaman publik)
    // ─────────────────────────────────────────
    public function publik(): string
    {
        $kategori = $this->request->getGet('kategori') ?? 'Semua';

        $panduan    = $this->panduanModel->getPanduanWithAdmin($kategori, 9);
        $pager      = $this->panduanModel->pager;
        $countByKat = $this->panduanModel->getCountByKategori();
        $total      = array_sum($countByKat);

        return view('panduan/index', [
            'panduan'     => $panduan,
            'pager'       => $pager,
            'countByKat'  => $countByKat,
            'total'       => $total,
            'aktifFilter' => $kategori,
        ]);
    }

    // ─────────────────────────────────────────
    // GET /panduan/{id} (detail publik)
    // ─────────────────────────────────────────
    public function detail(int $id): string
    {
        $panduan = $this->panduanModel
            ->select('panduan.*, admins.nama as nama_admin')
            ->join('admins', 'admins.id = panduan.admin_id', 'left')
            ->find($id);

        if (! $panduan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Panduan #$id tidak ditemukan.");
        }

        $this->panduanModel->tambahBaca($id);

        return view('panduan/detail', ['panduan' => $panduan]);
    }
}
