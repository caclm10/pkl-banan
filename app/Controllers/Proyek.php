<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Proyek extends BaseController
{
    protected $helpers = ['datetime'];

    public function index($proyekId = null)
    {
        // dd((new \App\Models\ProyekModel())->getProyekWithGambarAndPekerja($proyekId));
        if ($proyekId != null) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON((new \App\Models\ProyekModel())->getProyekWithGambarAndPekerja($proyekId));
            } else {
                return redirect()->to('/proyek');
            }
        }

        // dd(json_encode((new \App\Models\ProyekModel())->getProyekWithFirstGambar()));

        return view('proyek', [
            'projects' => (new \App\Models\ProyekModel())->getProyekWithFirstGambar()
        ]);
    }
}
