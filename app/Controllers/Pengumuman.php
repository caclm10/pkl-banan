<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pengumuman extends BaseController
{
    protected $helpers = ['datetime'];

    public function index()
    {
        return view('pengumuman', [
            'announcements' => (new \App\Models\PengumumanModel())->orderBy('tanggal_dibuat', 'desc')->find(),
        ]);
    }
}
