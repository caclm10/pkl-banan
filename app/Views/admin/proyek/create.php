<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <?= view('components/back-button', ['to' => '/admin/proyek']) ?>
    </div>

    <form action="/admin/proyek" method="POST">
        <?= view('components/input', ['name' => 'nama']) ?>

        <?= view('components/textarea', ['name' => 'deskripsi']) ?>

        <?= view('components/input', ['name' => 'tanggal_mulai', 'type' => 'date', 'label' => 'Tanggal Mulai']) ?>

        <?= view('components/input', ['name' => 'tanggal_selesai', 'type' => 'date', 'label' => 'Tanggal Selesai']) ?>

        <?= view('components/form-submit') ?>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('vendor-scripts') ?>
<script src="/js/autosize.min.js"></script>
<?= $this->endSection() ?>