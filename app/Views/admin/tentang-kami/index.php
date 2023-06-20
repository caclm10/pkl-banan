<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <form action="/admin/tentang-kami" method="POST">
        <?= formMethod('PUT') ?>

        <?= view('components/rte', ['name' => 'deskripsi', 'value' => $about['deskripsi']]) ?>

        <?= view('components/textarea', ['name' => 'visi', 'value' => $about['visi']]) ?>

        <?= view('components/form-submit') ?>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('vendor-scripts') ?>
<script src="/js/autosize.min.js"></script>
<script src="/js/tinymce/tinymce.min.js"></script>
<?= $this->endSection() ?>