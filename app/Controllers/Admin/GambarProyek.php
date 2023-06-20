<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class GambarProyek extends AdminController
{
    protected $instance = 'gambar-proyek';

    protected $proyekModel;

    public function __construct()
    {
        $this->model = new \App\Models\GambarProyekModel();

        $this->proyekModel = new \App\Models\ProyekModel();
    }

    public function index($projectId)
    {
        return $this->view('index', [
            'project' => $this->proyekModel->find($projectId),
            'projectImages' => $this->model->where('id_proyek', $projectId)->orderBy('urutan')->find()
        ]);
    }

    public function store($projectId)
    {
        $image = $this->request->getFile('gambar');

        $this->checkValidation($this->model->getRules($image), $this->model->getErrorMessages(), true);

        $this->populateData();

        $this->pushData("id_proyek", $projectId);

        $path = '';

        $path = $this->storeImage($image, 'path_gambar', 'images');

        $this->insertModel([], false);

        return $this->response->setJSON(['path_gambar' => $path, 'id' => $this->model->getInsertID()]);
    }

    public function update($projectId)
    {
        $images = $this->request->getJSON(true);

        $updated = $this->model->updateUrutan($images);

        if ($updated) {
            return $this->response->setJSON([]);
        }

        return $this->response->setStatusCode(400);
    }

    public function destroy($projectId, $imageId)
    {
        $this->redirectIfEmpty($imageId);

        $this->deleteModel($imageId, 'path_gambar', false);

        return $this->response->setJSON([]);
    }
}
