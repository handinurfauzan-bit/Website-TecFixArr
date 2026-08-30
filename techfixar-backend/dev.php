<?php

/**
 * Jalankan development server dengan sync frontend otomatis.
 *
 *   php dev.php
 *   composer dev
 */

declare(strict_types=1);

$backendRoot = __DIR__;

echo "TechFixAr — development server\n";
echo str_repeat('-', 40) . "\n";

passthru('php ' . escapeshellarg($backendRoot . DIRECTORY_SEPARATOR . 'sync-frontend.php'), $syncCode);

if ($syncCode !== 0) {
    fwrite(STDERR, "\nGagal sinkronisasi frontend. Server tidak dijalankan.\n");
    exit(1);
}

echo "\nServer: http://localhost:8080\n";
echo "Tekan Ctrl+C untuk berhenti.\n";
echo str_repeat('-', 40) . "\n\n";

passthru('php ' . escapeshellarg($backendRoot . DIRECTORY_SEPARATOR . 'spark') . ' serve', $serveCode);

exit($serveCode);
