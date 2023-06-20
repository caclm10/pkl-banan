<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <?= view('components/back-button', ['to' => '/admin/pekerja-tambahan']) ?>
    </div>

    <form action="/admin/pekerja-tambahan" method="POST" enctype="multipart/form-data">
        <?= view('components/input', ['name' => 'nama']) ?>

        <?= view('components/input', ['name' => 'jabatan']) ?>

        <?= view('components/file-input', ['name' => 'gambar', 'isImage' => true]) ?>

        <?= view('components/form-submit') ?>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('vendor-scripts') ?>
<script src="/js/autosize.min.js"></script>
<?= $this->endSection() ?>