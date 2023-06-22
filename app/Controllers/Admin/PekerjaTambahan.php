<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class PekerjaTambahan extends AdminController
{
    protected $instance = 'pekerja-tambahan';

    public function __construct()
    {
        $this->model = new \App\Models\PekerjaTambahanModel();
    }

    public function index()
    {
        return $this->view('index', [
            'workers' => $this->model->find(),
        ]);
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store()
    {
        $image = $this->request->getFile('gambar');

        $this->checkValidation($this->model->getRules($image), $this->model->getErrorMessages());

        $this->populateData();

        $this->storeImage($image, 'path_gambar', 'images');

        $this->insertModel();

        return $this->redirectToIndex();
    }

    public function edit($id)
    {
        $this->redirectIfEmpty($id);

        return $this->view('edit', [
            'worker' => $this->model->find($id)
        ]);
    }

    public function update($id)
    {
        $this->redirectIfEmpty($id);

        $isDeleteImage = $this->request->getPost('hapus_gambar') === "";

        $image = null;

        if (!$isDeleteImage) {
            $image = $this->request->getFile('gambar');
        }
        $worker = $this->model->find($id);

        $this->checkValidation($this->model->getRules($image, $worker['path_gambar']), $this->model->getErrorMessages());

        $this->populateData();

        if ($isDeleteImage) {
            if ($worker['path_gambar']) {
                deletePublicFile($worker['path_gambar']);
                $this->pushData("path_gambar", NULL);
            }
        } else {
            $this->updateImage($image, 'path_gambar', 'images', $worker['path_gambar']);
        }

        $this->updateModel($id);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->redirectIfEmpty($id);

        if ($this->model->isPekerjaProyek($id)) {
            $this->notif('has-project');
        } else {
            $this->deleteModel($id, 'path_gambar');
        }


        return redirect()->back();
    }
}
