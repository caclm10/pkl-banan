<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <?= view('components/back-button', ['to' => '/admin/dashboard']) ?>
    </div>

    <form action="/admin/akun/password" method="POST">
        <?= formMethod('PUT') ?>

        <?= view('components/input-password', ['name' => 'password_lama', 'id' => 'passwordLama', 'label' => 'Password Lama']) ?>

        <?= view('components/input-password', ['name' => 'password_baru', 'id' => 'passwordBaru', 'label' => 'Password Baru']) ?>

        <?= view('components/input-password', ['name' => 'konfirmasi_password_baru', 'id' => 'konfirmasiPasswordBaru', 'label' => 'Konfirmasi Password Baru']) ?>

        <?= view('components/form-submit') ?>
    </form>
</div>

<?= $this->endSection() ?>