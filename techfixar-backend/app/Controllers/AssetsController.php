<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Frontend;

/**
 * Menyajikan CSS/JS dari Website-TecFixArr/assets/ tanpa menyalin ke public/.
 */
class AssetsController extends Controller
{
    private const MIME = [
        'css'   => 'text/css; charset=UTF-8',
        'js'    => 'application/javascript; charset=UTF-8',
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'png'   => 'image/png',
        'gif'   => 'image/gif',
        'svg'   => 'image/svg+xml',
        'webp'  => 'image/webp',
        'woff'  => 'font/woff',
        'woff2' => 'font/woff2',
        'ico'   => 'image/x-icon',
    ];

    public function css(...$segments): \CodeIgniter\HTTP\ResponseInterface
    {
        return $this->serve('css', implode('/', $segments));
    }

    public function js(...$segments): \CodeIgniter\HTTP\ResponseInterface
    {
        return $this->serve('js', implode('/', $segments));
    }

    private function serve(string $type, string $path): \CodeIgniter\HTTP\ResponseInterface
    {
        $path = str_replace('\\', '/', $path);
        $path = ltrim($path, '/');

        if ($path === '' || str_contains($path, '..')) {
            return $this->response->setStatusCode(404);
        }

        $frontend = config(Frontend::class);
        $file     = $frontend->assetsPath($type) . DIRECTORY_SEPARATOR
            . str_replace('/', DIRECTORY_SEPARATOR, $path);

        if (! is_file($file)) {
            return $this->response->setStatusCode(404);
        }

        $ext  = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $mime = self::MIME[$ext] ?? 'application/octet-stream';

        return $this->response
            ->setHeader('Content-Type', $mime)
            ->setHeader('Cache-Control', 'public, max-age=3600')
            ->setBody((string) file_get_contents($file));
    }
}
