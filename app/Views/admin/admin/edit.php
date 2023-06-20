<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <?= view('components/back-button', ['to' => '/admin/admin']) ?>
    </div>

    <form action="/admin/admin/<?= $admin['id'] ?>" method="POST">
        <?= formMethod('PUT') ?>

        <?= view('components/input', ['name' => 'nama', 'value' => $admin['nama']]) ?>

        <?= view('components/input', ['name' => 'email', 'value' => $admin['email'], 'disabled' => true], ['saveData' => false]) ?>


        <?= view('components/form-submit') ?>
    </form>
</div>

<?= $this->endSection() ?>


<?= $this->section('vendor-scripts') ?>
<script src="/js/tinymce/tinymce.min.js"></script>
<?= $this->endSection() ?>