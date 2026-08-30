<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class HomeController extends Controller
{
    public function index(): string
    {
        return view('landing');
    }

    public function tentang(): string
    {
        return view('tentang');
    }

    public function komunitas(): string
    {
        return view('komunitas');
    }

    public function simulasi(): string
    {
        return view('simulasi');
    }
}
