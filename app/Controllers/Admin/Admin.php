<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Admin extends AdminController
{
    protected $instance = "admin";

    public function __construct()
    {
        $this->model = new \App\Models\AdminModel();
    }

    public function index()
    {
        return $this->view("index", [
            "admins" => $this->model->orderBy("nama")->find(),
        ]);
    }

    public function create()
    {
        return $this->view("create");
    }

    public function store()
    {
        $this->checkValidation($this->model->getRules(), $this->model->getErrorMessages());

        $this->populateData();

        $this->insertModel([
            "password" => password_hash($this->data["password"], PASSWORD_BCRYPT),
        ]);

        return $this->redirectToIndex();
    }

    public function edit($id)
    {
        $this->redirectIfEmpty($id);

        return $this->view("edit", [
            "admin" => $this->model->find($id)
        ]);
    }

    public function update($id)
    {
        $this->redirectIfEmpty($id);

        $this->checkValidation($this->model->getRules(true), $this->model->getErrorMessages());

        $this->populateData();

        $this->unsetData('email');

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
