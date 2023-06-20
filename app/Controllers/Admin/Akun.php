<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Akun extends AdminController
{
    protected $instance = 'akun';

    public function __construct()
    {
        $this->model = new \App\Models\AdminModel();
    }

    public function index()
    {
        return $this->view('index');
    }

    public function update()
    {
        $this->checkValidation([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'max_length' => 'Nama maksimal {param} karakter.'
                ]
            ]
        ]);

        $this->populateData();

        unset($this->data['email']);

        $this->model
            ->set($this->data)
            ->where('email', auth()['email'])
            ->update();

        authLogin($this->model->where('email', auth()['email'])->first());

        $this->notif('saved');

        return redirect()->back();
    }
}
