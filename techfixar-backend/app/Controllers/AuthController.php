<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected AdminModel $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        helper(['form', 'url']);
    }

    // ─────────────────────────────────────────
    // GET /login
    // ─────────────────────────────────────────
    public function loginForm(): string
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->get('admin_id')) {
            return redirect()->to('/admin/panduan');
        }

        return view('auth/login');
    }

    // ─────────────────────────────────────────
    // POST /login
    // ─────────────────────────────────────────
    public function loginProses()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());
        }

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $admin = $this->adminModel->findByEmail($email);

        if (! $admin || ! password_verify($password, $admin['password'])) {
            return redirect()->back()
                             ->withInput()
                             ->with('error', 'Email atau password salah.');
        }

        if ($admin['status'] !== 'aktif') {
            $pesan = match ($admin['status']) {
                'pending' => 'Akun Anda sedang menunggu persetujuan Super Admin.',
                'ditolak' => 'Akun Anda telah ditolak. Hubungi Super Admin.',
                default   => 'Akun Anda tidak dapat digunakan saat ini.',
            };

            return redirect()->back()->withInput()->with('error', $pesan);
        }

        // Simpan session
        session()->set([
            'admin_id'   => $admin['id'],
            'admin_nama' => $admin['nama'],
            'admin_role' => $admin['role'],
            'logged_in'  => true,
        ]);

        return redirect()->to('/admin/panduan')->with('success', 'Selamat datang, ' . $admin['nama'] . '!');
    }

    // ─────────────────────────────────────────
    // GET /register
    // ─────────────────────────────────────────
    public function registerForm(): string
    {
        if (session()->get('admin_id')) {
            return redirect()->to('/admin/panduan');
        }

        return view('auth/register');
    }

    // ─────────────────────────────────────────
    // POST /register
    // ─────────────────────────────────────────
    public function registerProses()
    {
        $rules = [
            'nama'             => 'required|min_length[3]|max_length[100]',
            'email'            => 'required|valid_email|is_unique[admins.email]',
            'password'         => 'required|min_length[8]',
            'password_confirm' => 'required|matches[password]',
        ];

        $messages = [
            'email'            => ['is_unique' => 'Email sudah terdaftar.'],
            'password_confirm' => ['matches'   => 'Konfirmasi password tidak cocok.'],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());
        }

        $this->adminModel->save([
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'), // di-hash otomatis oleh model
            'role'     => 'admin',
            'status'   => 'pending',
        ]);

        return redirect()->to('/login')
                         ->with('success', 'Pendaftaran berhasil! Tunggu persetujuan Super Admin.');
    }

    // ─────────────────────────────────────────
    // GET /logout
    // ─────────────────────────────────────────
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')->with('success', 'Anda telah keluar.');
    }
}
