<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Tim extends AdminController
{
    protected $instance = 'tim';

    public function __construct()
    {
        $this->model = new \App\Models\TimModel();
    }

    public function index()
    {
        return $this->view('index', [
            'teams' => $this->model->find(),
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
            'team' => $this->model->find($id)
        ]);
    }

    public function update($id)
    {
        $this->redirectIfEmpty($id);

        $image = $this->request->getFile('gambar');
        $team = $this->model->find($id);

        $this->checkValidation($this->model->getRules($image, $team['path_gambar']), $this->model->getErrorMessages());

        $this->populateData();

        $this->updateImage($image, 'path_gambar', 'images', $team['path_gambar']);

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
