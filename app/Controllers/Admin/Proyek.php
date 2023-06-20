<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Proyek extends AdminController
{
    protected $instance = 'proyek';

    public function __construct()
    {
        $this->model = new \App\Models\ProyekModel();
    }

    public function index()
    {
        return $this->view('index', ['projects' => $this->model->find()]);
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store()
    {

        $this->checkValidation($this->model->getRules(), $this->model->getErrorMessages());

        $this->populateData();

        $this->insertModel();

        return $this->redirectToIndex();
    }

    public function edit($id)
    {
        $this->redirectIfEmpty($id);

        return $this->view('edit', ['project' => $this->model->find($id)]);
    }

    public function update($id)
    {
        $this->redirectIfEmpty($id);

        $this->checkValidation($this->model->getRules(), $this->model->getErrorMessages());

        $this->populateData();

        $this->updateModel($id);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->redirectIfEmpty($id);

        $this->deleteModel($id, 'path_gambar');

        return redirect()->back();
    }
}
