<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function loginView()
    {
        return view('login');
    }

    public function login()
    {
        $rules = [
            'password' => 'required',
            'email'    => 'required|valid_email',
        ];

        $errors = [
            'password' => [
                'required' => 'Password harus diisi.',
            ],
            'email' => [
                'required' => 'Email harus diisi.',
                'valid_email' => 'Email tidak valid.'
            ]
        ];

        $back = redirect()->back();

        if (!$this->validate($rules, $errors) || !authAttempt($this->request->getPost('email'), $this->request->getPost('password'))) {
            return $back->withInput();
        }

        return redirect()->to('/admin/dashboard');
    }

    public function logout()
    {
        authLogout();

        return redirect()->to('/login');
    }
}
