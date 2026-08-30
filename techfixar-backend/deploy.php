<?php

/**
 * Siapkan paket deploy TechFixAr untuk hosting.
 *
 *   php deploy.php
 *   deploy.bat
 */

declare(strict_types=1);

$backendRoot = __DIR__;
$repoRoot    = dirname($backendRoot);
$releaseDir  = $repoRoot . DIRECTORY_SEPARATOR . 'release';

function run(string $command): int
{
    echo "→ {$command}\n";
    passthru($command, $code);

    return $code;
}

function rrmdir(string $dir): void
{
    if (! is_dir($dir)) {
        return;
    }

    $items = scandir($dir);
    if ($items === false) {
        return;
    }

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }

        $path = $dir . DIRECTORY_SEPARATOR . $item;
        if (is_dir($path)) {
            rrmdir($path);
        } else {
            unlink($path);
        }
    }

    rmdir($dir);
}

function shouldSkipPath(string $relative): bool
{
    $relative = str_replace('\\', '/', $relative);

    $skipPrefixes = [
        'release/',
        '.git/',
        'tests/',
        'writable/cache/',
        'writable/logs/',
        'writable/session/',
        'writable/debugbar/',
    ];

    foreach ($skipPrefixes as $prefix) {
        if (str_starts_with($relative, $prefix)) {
            return true;
        }
    }

    $skipExact = [
        '.env',
        '.gitignore',
        'phpunit.xml.dist',
        'phpunit',
    ];

    return in_array($relative, $skipExact, true);
}

function addDirToZip(ZipArchive $zip, string $dir, int $baseLen): void
{
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $item) {
        $path     = $item->getPathname();
        $relative = substr($path, $baseLen);
        $relative = str_replace('\\', '/', $relative);

        if (shouldSkipPath($relative)) {
            continue;
        }

        if ($item->isDir()) {
            $zip->addEmptyDir($relative);
            continue;
        }

        $zip->addFile($path, $relative);
    }
}

echo "TechFixAr — persiapan deploy hosting\n";
echo str_repeat('=', 50) . "\n\n";

echo "[1/5] Sinkronkan frontend...\n";
if (run('php ' . escapeshellarg($backendRoot . DIRECTORY_SEPARATOR . 'sync-frontend.php')) !== 0) {
    exit(1);
}
echo "\n";

echo "[2/5] Install dependensi production...\n";
if (run('composer install --no-dev --optimize-autoloader --working-dir=' . escapeshellarg($backendRoot)) !== 0) {
    exit(1);
}
echo "\n";

echo "[3/5] Bersihkan cache...\n";
$cacheDir = $backendRoot . '/writable/cache';
if (is_dir($cacheDir)) {
    foreach (glob($cacheDir . '/*') ?: [] as $file) {
        if (is_file($file) && basename($file) !== 'index.html') {
            unlink($file);
        }
    }
}
echo "   Cache dibersihkan.\n\n";

echo "[4/5] Buat paket zip...\n";
if (! class_exists(ZipArchive::class)) {
    fwrite(STDERR, "   Ekstensi PHP zip tidak tersedia. Lewati pembuatan zip.\n");
    $zipPath = null;
} else {
    if (! is_dir($releaseDir) && ! mkdir($releaseDir, 0755, true) && ! is_dir($releaseDir)) {
        fwrite(STDERR, "   Gagal membuat folder release.\n");
        exit(1);
    }

    $zipName = 'techfixar-deploy-' . date('Y-m-d-His') . '.zip';
    $zipPath = $releaseDir . DIRECTORY_SEPARATOR . $zipName;

    $zip = new ZipArchive();
    if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
        fwrite(STDERR, "   Gagal membuat file zip.\n");
        exit(1);
    }

    addDirToZip($zip, $backendRoot, strlen($backendRoot) + 1);

    $frontendAssets = $repoRoot . DIRECTORY_SEPARATOR . 'Website-TecFixArr' . DIRECTORY_SEPARATOR . 'assets';
    if (is_dir($frontendAssets)) {
        addDirToZip($zip, $frontendAssets, strlen($repoRoot) + 1);
        echo "   Frontend assets ikut dalam paket (Website-TecFixArr/assets/).\n";
    } else {
        fwrite(STDERR, "   Peringatan: folder frontend assets tidak ditemukan.\n");
    }

    $zip->addFromString(
        'DEPLOY-README.txt',
        implode("\r\n", [
            'TechFixAr — petunjuk upload hosting',
            '==================================',
            '',
            '1. Upload isi zip ini ke server (via File Manager / FTP).',
            '2. Pastikan struktur: app/, public/, Website-TecFixArr/assets/ dalam satu folder backend.',
            '3. Salin .env.production.example menjadi .env, isi database & domain.',
            '4. Arahkan document root domain ke folder public/',
            '5. Set permission folder writable/ dan public/uploads/ ke 755 atau 775.',
            '6. Import database atau jalankan: php spark migrate && php spark db:seed AdminSeeder',
            '',
            'CSS/JS disajikan dari Website-TecFixArr/assets/ (bukan public/assets/).',
            'Panduan lengkap: HOSTING.md',
        ])
    );

    $zip->close();
    echo "   Paket siap: release/{$zipName}\n\n";
}

echo "[5/5] Kembalikan dependensi development (lokal)...\n";
if (run('composer install --working-dir=' . escapeshellarg($backendRoot)) !== 0) {
    exit(1);
}
echo "\n";

echo str_repeat('=', 50) . "\n";
echo "DEPLOY SELESAI — langkah tim di hosting:\n";
echo str_repeat('-', 50) . "\n";
echo "1. Beli domain + hosting (PHP 8.2+, MySQL, SSL gratis)\n";
echo "2. Upload zip dari folder release/ ke server\n";
echo "3. Extract, lalu set document root → folder public/\n";
echo "4. Buat database MySQL di cPanel, isi file .env\n";
echo "5. php spark migrate  +  php spark db:seed AdminSeeder\n";
echo "6. Buka domain — login admin: superadmin@techfixar.id / admin123\n";
echo "   (ganti password segera setelah pertama login!)\n";
echo str_repeat('-', 50) . "\n";
echo "Panduan detail: techfixar-backend/HOSTING.md\n";

if ($zipPath !== null) {
    echo "\nFile upload: {$zipPath}\n";
}
