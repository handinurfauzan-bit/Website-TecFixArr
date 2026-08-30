<?php

namespace App\Controllers;

use App\Models\PanduanModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Files\UploadedFile;

class PanduanController extends Controller
{
    protected PanduanModel $panduanModel;

    private const UPLOAD_DIR = 'uploads/panduan';

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

        $stepsData = $this->processStepsFromRequest();

        $this->panduanModel->save([
            'judul'           => $this->request->getPost('judul'),
            'kategori'        => $this->request->getPost('kategori'),
            'deskripsi'       => $this->request->getPost('deskripsi'),
            'konten'          => $this->buildKontenFromSteps($stepsData) ?: $this->request->getPost('konten'),
            'steps_data'      => $stepsData ? json_encode($stepsData, JSON_UNESCAPED_UNICODE) : null,
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

        $existingSteps = $this->decodeStepsData($panduan['steps_data'] ?? null);
        $stepsData     = $this->processStepsFromRequest($existingSteps);

        $this->panduanModel->update($id, [
            'judul'           => $this->request->getPost('judul'),
            'kategori'        => $this->request->getPost('kategori'),
            'deskripsi'       => $this->request->getPost('deskripsi'),
            'konten'          => $this->buildKontenFromSteps($stepsData) ?: $this->request->getPost('konten'),
            'steps_data'      => $stepsData ? json_encode($stepsData, JSON_UNESCAPED_UNICODE) : null,
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

        $this->deleteStepImages($this->decodeStepsData($panduan['steps_data'] ?? null));
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

    // ─────────────────────────────────────────
    // PRIVATE — proses upload gambar & steps
    // ─────────────────────────────────────────

    /**
     * @param array<int, array<string, mixed>>|null $existingSteps
     * @return array<int, array<string, mixed>>
     */
    private function processStepsFromRequest(?array $existingSteps = null): array
    {
        $stepsPost = $this->request->getPost('steps');

        if (! is_array($stepsPost) || $stepsPost === []) {
            return [];
        }

        $processed     = [];
        $existingSteps = $existingSteps ?? [];
        $uploadPath    = FCPATH . self::UPLOAD_DIR;

        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        foreach ($stepsPost as $index => $step) {
            if (! is_array($step)) {
                continue;
            }

            $lines = [];
            if (isset($step['lines']) && is_array($step['lines'])) {
                foreach ($step['lines'] as $line) {
                    if (! is_array($line)) {
                        continue;
                    }
                    $text = trim($line['text'] ?? '');
                    if ($text === '') {
                        continue;
                    }
                    $lines[] = [
                        'text'    => $text,
                        'is_warn' => ! empty($line['is_warn']),
                    ];
                }
            }

            $title     = trim($step['title'] ?? '');
            $imagePath = trim($step['existing_image'] ?? '');

            /** @var UploadedFile|null $file */
            $file = $this->request->getFile("steps.$index.image");

            if ($file && $file->isValid() && ! $file->hasMoved()) {
                $mimeOk  = in_array($file->getMimeType(), ['image/jpeg', 'image/png', 'image/gif', 'image/webp'], true);
                $sizeOk  = $file->getSize() <= 5 * 1024 * 1024;

                if ($mimeOk && $sizeOk) {
                    if ($imagePath !== '') {
                        $this->unlinkImage($imagePath);
                    }

                    $newName = $file->getRandomName();
                    $file->move($uploadPath, $newName);
                    $imagePath = self::UPLOAD_DIR . '/' . $newName;
                }
            } elseif ($imagePath === '' && isset($existingSteps[$index]['image_path'])) {
                $imagePath = $existingSteps[$index]['image_path'];
            }

            if ($title === '' && $lines === [] && $imagePath === '') {
                continue;
            }

            $processed[] = [
                'title'      => $title,
                'lines'      => $lines,
                'image_path' => $imagePath !== '' ? $imagePath : null,
            ];
        }

        // Hapus gambar dari step yang dihapus saat edit
        if ($existingSteps !== []) {
            $keptPaths = array_filter(array_column($processed, 'image_path'));
            foreach ($existingSteps as $oldStep) {
                $oldPath = $oldStep['image_path'] ?? null;
                if ($oldPath && ! in_array($oldPath, $keptPaths, true)) {
                    $this->unlinkImage($oldPath);
                }
            }
        }

        return $processed;
    }

    /**
     * @param array<int, array<string, mixed>> $steps
     */
    private function buildKontenFromSteps(array $steps): string
    {
        if ($steps === []) {
            return '';
        }

        $parts = [];
        foreach ($steps as $i => $step) {
            $header = 'Langkah ' . ($i + 1);
            if (! empty($step['title'])) {
                $header .= ': ' . $step['title'];
            }

            $lineTexts = [];
            foreach ($step['lines'] ?? [] as $line) {
                $prefix = ! empty($line['is_warn']) ? '[PERINGATAN] ' : '';
                $lineTexts[] = $prefix . ($line['text'] ?? '');
            }

            $block = $header;
            if ($lineTexts !== []) {
                $block .= "\n" . implode("\n", $lineTexts);
            }
            $parts[] = $block;
        }

        return implode("\n\n", $parts);
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function decodeStepsData(?string $json): array
    {
        if ($json === null || $json === '') {
            return [];
        }

        $data = json_decode($json, true);

        return is_array($data) ? $data : [];
    }

    /**
     * @param array<int, array<string, mixed>> $steps
     */
    private function deleteStepImages(array $steps): void
    {
        foreach ($steps as $step) {
            $path = $step['image_path'] ?? null;
            if ($path) {
                $this->unlinkImage($path);
            }
        }
    }

    private function unlinkImage(string $relativePath): void
    {
        $fullPath = FCPATH . ltrim($relativePath, '/');
        if (is_file($fullPath)) {
            unlink($fullPath);
        }
    }
}
