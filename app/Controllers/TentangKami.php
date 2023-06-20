<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TentangKami extends BaseController
{
    public function index()
    {
        return view('tentang-kami', [
            'teams' => (new \App\Models\TimModel())->find(),
        ]);
    }
}
