<?php

use App\Models\AdminModel;
use Config\Services;

function authAttempt($email, $password)
{
    $adminModel = new AdminModel();

    $admin = $adminModel->where('email', $email)
        ->first();

    if (!$admin || ($admin && !password_verify($password, $admin['password']))) {
        $validation = Services::validation();
        $validation->setError('credentials', 'Email atau password tidak sesuai.');

        return false;
    }

    session()->set('auth_data', [
        'nama' => $admin['nama'],
        'email' => $admin['email'],
    ]);

    return true;
}

function authLogin($admin)
{
    session()->set('auth_data', [
        'nama' => $admin['nama'],
        'email' => $admin['email'],
    ]);
}

function authLogout()
{
    session()->destroy();
}

function isLoggedIn()
{
    return session()->has('auth_data');
}

function auth()
{
    return session()->get('auth_data');
}
