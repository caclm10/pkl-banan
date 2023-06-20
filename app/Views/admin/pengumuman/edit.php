<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <?= view('components/back-button', ['to' => '/admin/pengumuman']) ?>
    </div>

    <form action="/admin/pengumuman/<?= $announcement['id'] ?>" method="POST">
        <?= formMethod('PUT') ?>

        <?= view('components/rte', ['name' => 'isi', 'value' => $announcement['isi']]) ?>

        <?= view('components/form-submit') ?>
    </form>
</div>

<?= $this->endSection() ?>


<?= $this->section('vendor-scripts') ?>
<script src="/js/tinymce/tinymce.min.js"></script>
<?= $this->endSection() ?>