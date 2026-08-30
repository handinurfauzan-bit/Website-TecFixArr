<?php

/**
 * Sinkronkan halaman HTML frontend → PHP view CodeIgniter.
 *
 * CSS/JS tidak disalin ke backend — disajikan langsung dari
 * Website-TecFixArr/assets/ lewat AssetsController.
 *
 * Jalankan dari folder techfixar-backend:
 *   php sync-frontend.php
 *
 * Atau dari root repo:
 *   sync-frontend.bat
 */

declare(strict_types=1);

$backendRoot  = __DIR__;
$frontendRoot = dirname($backendRoot) . DIRECTORY_SEPARATOR . 'Website-TecFixArr';

if (! is_dir($frontendRoot)) {
    fwrite(STDERR, "Folder frontend tidak ditemukan: {$frontendRoot}\n");
    exit(1);
}

/** Halaman publik yang disalin HTML → PHP view */
const PUBLIC_PAGES = [
    'Landing.html'   => 'landing.php',
    'Tentang.html'   => 'tentang.php',
    'Komunitas.html' => 'komunitas.php',
    'Simulasi.html'  => 'simulasi.php',
];

function convertHtmlToPhpView(string $html): string
{
    // CSS & JS
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

    // Navigasi internal → route backend
    $linkMap = [
        'Landing.html'              => "<?= site_url('/') ?>",
        'Panduan.html'              => "<?= site_url('/panduan') ?>",
        'Tutorial_panduan.html'     => "<?= site_url('/panduan') ?>",
        'Tentang.html'              => "<?= site_url('/tentang') ?>",
        'Komunitas.html'            => "<?= site_url('/komunitas') ?>",
        'Simulasi.html'             => "<?= site_url('/simulasi') ?>",
        'login_admin.html'          => "<?= site_url('/login') ?>",
        'Registerasi_admin.html'    => "<?= site_url('/register') ?>",
        'Kelola_panduan_admin.html' => "<?= site_url('/admin/panduan') ?>",
        'Panduan_baru_admin.html'   => "<?= site_url('/admin/panduan/baru') ?>",
        'Edit_panduan_admin.html'   => "<?= site_url('/admin/panduan/edit/1') ?>",
        'verifikasi_admin.html'     => "<?= site_url('/admin/verifikasi') ?>",
    ];

    foreach ($linkMap as $file => $url) {
        $html = str_replace('href="' . $file . '"', 'href="' . $url . '"', $html);
        $html = str_replace("href='" . $file . "'", "href='" . $url . "'", $html);
    }

    // Anchor lama di footer landing → route halaman
    $anchorMap = [
        '#tentang'   => "<?= site_url('/tentang') ?>",
        '#komunitas' => "<?= site_url('/komunitas') ?>",
        '#simulasi'  => "<?= site_url('/simulasi') ?>",
    ];

    foreach ($anchorMap as $anchor => $url) {
        $html = str_replace('href="' . $anchor . '"', 'href="' . $url . '"', $html);
        $html = str_replace("href='" . $anchor . "'", "href='" . $url . "'", $html);
    }

    // Form statis yang masih pakai localhost hardcoded
    $html = str_replace(
        'action="http://localhost:8080/login"',
        'action="<?= site_url(\'/login\') ?>"',
        $html
    );
    $html = str_replace(
        'action="http://localhost:8080/register"',
        'action="<?= site_url(\'/register\') ?>"',
        $html
    );
    $html = str_replace(
        'action="http://localhost:8080/panduan/simpan"',
        'action="<?= site_url(\'/admin/panduan/simpan\') ?>"',
        $html
    );

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
    echo "  - View: {$htmlFile} → app/Views/{$phpFile}\n";
}

echo "TechFixAr — sinkronisasi view frontend → backend\n";
echo "Sumber : {$frontendRoot}\n";
echo "Target : {$backendRoot}\n";
echo str_repeat('-', 56) . "\n";

echo "1) Menyinkronkan halaman publik ke app/Views ...\n";
foreach (PUBLIC_PAGES as $html => $php) {
    syncView($html, $php, $frontendRoot, $backendRoot);
}

echo "2) Membersihkan cache CodeIgniter ...\n";
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
echo str_repeat('-', 56) . "\n";
echo "Selesai.\n";
echo "  • CSS/JS tetap di Website-TecFixArr/assets/ (disajikan lewat route /assets/)\n";
echo "  • Development : serve.bat  atau  composer dev\n";
echo "\nAturan edit:\n";
echo "  • CSS/JS/HTML publik → Website-TecFixArr/\n";
echo "  • PHP/logic/admin    → techfixar-backend/app/\n";
