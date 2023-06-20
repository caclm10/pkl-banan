<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Password extends AdminController
{
    protected $instance = 'password';
    protected $routePrefix = 'akun';

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
        $admin = $this->model->where('email', auth()['email'])->first();

        $this->checkValidation([
            'password_lama' => [
                'required',
                static fn ($value) => password_verify($value, $admin['password'])
            ],
            'password_baru' => 'required|min_length[6]|max_length[20]',
            'konfirmasi_password_baru' => 'required_with[password_baru]|matches[password_baru]'
        ], [
            'password_lama' => [
                'required' => 'Password lama harus diisi.',
                1 => 'Password lama salah.'
            ],
            'password_baru' => [
                'required' => 'Password baru harus diisi.',
                'min_length' => 'Password minimal {param} karakter.',
                'max_length' => 'Password maksimal {param} karakter.'
            ],
            'konfirmasi_password_baru' => [
                'required_with' => 'Konfirmasi password harus diisi.',
                'matches' => 'Konfirmasi password tidak sesuai.'
            ]
        ]);


        $this->model
            ->set('password', password_hash($this->request->getPost()['password_baru'], PASSWORD_DEFAULT))
            ->where('email', auth()['email'])
            ->update();

        $this->notif('saved');

        return redirect()->back();
    }
}
