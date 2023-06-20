<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <?= view('components/back-button', ['to' => '/admin/pengumuman']) ?>
    </div>

    <form action="/admin/pengumuman" method="POST">
        <?= view('components/rte', ['name' => 'isi']) ?>

        <?= view('components/form-submit') ?>
    </form>

</div>

<?= $this->endSection() ?>

<?= $this->section('vendor-scripts') ?>
<script src="/js/tinymce/tinymce.min.js"></script>
<?= $this->endSection() ?>