<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Path ke folder frontend statis (Website-TecFixArr).
 *
 * CSS/JS hanya ada di sini. Backend menyajikannya lewat AssetsController
 * (route /assets/css/* dan /assets/js/*), bukan dari public/assets/.
 */
class Frontend extends BaseConfig
{
    /** @var string Path absolut ke folder Website-TecFixArr */
    public string $rootPath = '';

    public function __construct()
    {
        parent::__construct();

        $sibling = realpath(ROOTPATH . '../Website-TecFixArr');
        $bundled = realpath(ROOTPATH . 'Website-TecFixArr');

        if ($sibling !== false && is_dir($sibling . DIRECTORY_SEPARATOR . 'assets')) {
            $this->rootPath = $sibling;
        } elseif ($bundled !== false && is_dir($bundled . DIRECTORY_SEPARATOR . 'assets')) {
            $this->rootPath = $bundled;
        } else {
            $this->rootPath = ROOTPATH . '../Website-TecFixArr';
        }
    }

    /** Path absolut ke assets/css atau assets/js */
    public function assetsPath(string $type): string
    {
        return rtrim($this->rootPath, '/\\') . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . $type;
    }
}
