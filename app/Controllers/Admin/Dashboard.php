<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $helpers = ['admin'];

    public function index()
    {
        return view('admin/dashboard', [
            'count' => [
                'project' => (new \App\Models\ProyekModel())->countAllResults(),
                'announcement' => (new \App\Models\PengumumanModel())->countAllResults(),
                'admin' => (new \App\Models\AdminModel())->countAllResults(),
            ]
        ]);
    }
}
