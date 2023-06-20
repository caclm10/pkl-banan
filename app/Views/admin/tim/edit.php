<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <?= view('components/back-button', ['to' => '/admin/tim']) ?>
    </div>

    <form action="/admin/tim/<?= $team['id'] ?>" method="POST" enctype="multipart/form-data">
        <?= formMethod('PUT') ?>

        <?= view('components/input', ['name' => 'nama', 'value' => $team['nama']]) ?>

        <?= view('components/input', ['name' => 'jabatan', 'value' => $team['jabatan']]) ?>

        <?= view('components/textarea', ['name' => 'deskripsi', 'value' => $team['deskripsi']]) ?>

        <?= view('components/file-input', ['name' => 'gambar', 'isImage' => true, 'value' => $team['path_gambar']]) ?>

        <?= view('components/form-submit') ?>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('vendor-scripts') ?>
<script src="/js/autosize.min.js"></script>
<?= $this->endSection() ?>