<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Pengumuman extends AdminController
{
    protected $instance = 'pengumuman';

    public function __construct()
    {
        $this->model = new \App\Models\PengumumanModel();
        $this->addHelpers(['datetime']);
    }

    public function index()
    {
        return $this->view('index', [
            'announcements' => $this->model->find(),
        ]);
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

        return $this->view('edit', [
            'announcement' => $this->model->find($id)
        ]);
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

        $this->deleteModel($id);

        return redirect()->back();
    }
}
