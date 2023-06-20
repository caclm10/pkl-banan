<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home', [
            'projects' => (new \App\Models\ProyekModel())->limit(3)->find(),
        ]);
    }
}
