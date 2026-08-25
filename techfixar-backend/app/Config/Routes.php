<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ── Halaman Publik ───────────────────────────────────────────────────
$routes->get('/',               'HomeController::index');
$routes->get('/panduan',        'PanduanController::publik');
$routes->get('/panduan/(:num)', 'PanduanController::detail/$1');

// ── Auth ─────────────────────────────────────────────────────────────
$routes->get('/login',     'AuthController::loginForm');
$routes->post('/login',    'AuthController::loginProses');
$routes->get('/register',  'AuthController::registerForm');
$routes->post('/register', 'AuthController::registerProses');
$routes->get('/logout',    'AuthController::logout');

// ── Admin (wajib login via filter 'auth') ────────────────────────────
$routes->group('/admin', ['filter' => 'auth'], static function ($routes) {

    // Redirect /admin → kelola panduan
    $routes->get('/', 'PanduanController::index');

    // Kelola Panduan
    $routes->get('panduan',                'PanduanController::index');
    $routes->get('panduan/baru',           'PanduanController::baru');
    $routes->post('panduan/simpan',        'PanduanController::simpan');
    $routes->get('panduan/edit/(:num)',    'PanduanController::edit/$1');
    $routes->post('panduan/update/(:num)', 'PanduanController::update/$1');
    $routes->post('panduan/hapus/(:num)',  'PanduanController::hapus/$1');

    // Verifikasi Admin (super_admin only — dicek di dalam controller)
    $routes->get('verifikasi',                  'VerifikasiController::index');
    $routes->post('verifikasi/setujui/(:num)',   'VerifikasiController::setujui/$1');
    $routes->post('verifikasi/tolak/(:num)',     'VerifikasiController::tolak/$1');
    $routes->post('verifikasi/hapus/(:num)',     'VerifikasiController::hapus/$1');
});
