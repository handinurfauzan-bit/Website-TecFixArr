<?php

/**
 * Sinkronkan frontend statis (Website-TecFixArr) ke backend CodeIgniter.
 *
 * Jalankan setelah mengubah file di Website-TecFixArr/pages atau assets:
 *   php sync-frontend.php
 */

declare(strict_types=1);

$backendRoot  = __DIR__;
$frontendRoot = dirname($backendRoot) . DIRECTORY_SEPARATOR . 'Website-TecFixArr';

if (! is_dir($frontendRoot)) {
    fwrite(STDERR, "Folder frontend tidak ditemukan: {$frontendRoot}\n");
    exit(1);
}

function copyDirectory(string $source, string $destination): int
{
    if (! is_dir($source)) {
        return 0;
    }

    if (! is_dir($destination) && ! mkdir($destination, 0755, true) && ! is_dir($destination)) {
        throw new RuntimeException("Gagal membuat folder: {$destination}");
    }

    $count = 0;
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($source, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $item) {
        $target = $destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName();

        if ($item->isDir()) {
            if (! is_dir($target)) {
                mkdir($target, 0755, true);
            }
            continue;
        }

        if (! copy($item->getPathname(), $target)) {
            throw new RuntimeException("Gagal menyalin: {$item->getPathname()}");
        }
        $count++;
    }

    return $count;
}

function convertHtmlToPhpView(string $html): string
{
    $html = preg_replace(
        '#(href|src)="../assets/css/([^"]+)"#',
        '$1="<?= base_url(\'assets/css/$2\') ?>"',
        $html
    ) ?? $html;

    $html = preg_replace(
        '#(href|src)="../assets/js/([^"]+)"#',
        '$1="<?= base_url(\'assets/js/$2\') ?>"',
        $html
    ) ?? $html;

    $linkMap = [
        'Landing.html'            => "<?= site_url('/') ?>",
        'Panduan.html'            => "<?= site_url('/panduan') ?>",
        'Tutorial_panduan.html'   => "<?= site_url('/panduan') ?>",
        'login_admin.html'        => "<?= site_url('/login') ?>",
        'Registerasi_admin.html'  => "<?= site_url('/register') ?>",
        'Kelola_panduan_admin.html' => "<?= site_url('/admin/panduan') ?>",
        'Panduan_baru_admin.html' => "<?= site_url('/admin/panduan/baru') ?>",
        'Edit_panduan_admin.html' => "<?= site_url('/admin/panduan/edit/1') ?>",
        'verifikasi_admin.html'   => "<?= site_url('/admin/verifikasi') ?>",
        'Tentang.html'            => '#tentang',
        'Komunitas.html'          => '#komunitas',
        'Simulasi.html'           => '#simulasi',
    ];

    foreach ($linkMap as $file => $url) {
        $html = str_replace('href="' . $file . '"', 'href="' . $url . '"', $html);
        $html = str_replace("href='" . $file . "'", "href='" . $url . "'", $html);
    }

    $adminFabPhp = <<<'PHP'
      <?php if (session()->get('logged_in')): ?>
      <a class="admin-fab" href="<?= site_url('/admin/panduan') ?>" aria-label="Masuk ke area admin" title="Admin Panel">
        <span class="admin-fab__icon" aria-hidden="true">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </span>
        <span class="admin-fab__label">Admin</span>
      </a>
      <?php endif ?>
PHP;

    $html = preg_replace(
        '#<a class="admin-fab"[^>]*>.*?</a>#s',
        $adminFabPhp,
        $html,
        1
    ) ?? $html;

    // main.js belum ada di repo — hapus agar tidak 404
    $html = preg_replace('#\s*<script src="<\?= base_url\(\'assets/js/main\.js\'\) \?>"></script>#', '', $html) ?? $html;

    return $html;
}

function syncView(string $htmlFile, string $phpFile, string $frontendRoot, string $backendRoot): void
{
    $source = $frontendRoot . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . $htmlFile;
    $target = $backendRoot . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $phpFile;

    if (! is_file($source)) {
        echo "  - Lewati view (sumber tidak ada): {$htmlFile}\n";
        return;
    }

    $converted = convertHtmlToPhpView((string) file_get_contents($source));
    $targetDir = dirname($target);

    if (! is_dir($targetDir) && ! mkdir($targetDir, 0755, true) && ! is_dir($targetDir)) {
        throw new RuntimeException("Gagal membuat folder view: {$targetDir}");
    }

    file_put_contents($target, $converted);
    echo "  - View disinkronkan: {$htmlFile} -> app/Views/{$phpFile}\n";
}

echo "TechFixAr — sinkronisasi frontend ke backend\n";
echo str_repeat('-', 48) . "\n";

echo "1) Menyalin assets/css ...\n";
$cssCount = copyDirectory($frontendRoot . '/assets/css', $backendRoot . '/public/assets/css');
echo "   {$cssCount} file CSS disalin.\n";

echo "2) Menyalin assets/js ...\n";
$jsCount = copyDirectory($frontendRoot . '/assets/js', $backendRoot . '/public/assets/js');
echo "   {$jsCount} file JS disalin.\n";

echo "3) Menyinkronkan halaman statis ke app/Views ...\n";
syncView('Landing.html', 'landing.php', $frontendRoot, $backendRoot);

echo "4) Membersihkan cache CodeIgniter ...\n";
$cacheDir = $backendRoot . '/writable/cache';
$cleared  = 0;

if (is_dir($cacheDir)) {
    foreach (glob($cacheDir . '/*') ?: [] as $file) {
        if (is_file($file) && basename($file) !== 'index.html') {
            unlink($file);
            $cleared++;
        }
    }
}

echo "   {$cleared} file cache dihapus.\n";
echo str_repeat('-', 48) . "\n";
echo "Selesai. Restart `php spark serve` lalu hard-refresh browser (Ctrl+Shift+R).\n";
echo "\nCatatan: halaman admin/auth/panduan punya logika PHP — hanya CSS/JS yang otomatis ikut.\n";
echo "         Untuk landing page, HTML terbaru sudah disalin ke app/Views/landing.php.\n";
