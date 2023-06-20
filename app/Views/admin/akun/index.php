<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <?= view('components/back-button', ['to' => '/admin/dashboard']) ?>
    </div>

    <form action="/admin/akun" method="POST">
        <?= formMethod('PUT') ?>

        <?= view('components/input', ['name' => 'nama', 'value' => auth()['nama']]) ?>

        <?= view('components/input', ['name' => 'email', 'value' => auth()['email'], 'disabled' => true], ['saveData' => false]) ?>

        <?= view('components/form-submit') ?>
    </form>
</div>

<?= $this->endSection() ?>