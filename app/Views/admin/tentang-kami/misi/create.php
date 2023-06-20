<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <?= view('components/back-button', ['to' => '/admin/tentang-kami/misi']) ?>
    </div>

    <form action="/admin/tentang-kami/misi" method="POST">
        <?= view('components/textarea', ['name' => 'isi', 'label' => 'Isi']) ?>

        <?= view('components/form-submit') ?>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('vendor-scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/autosize@5.0.2/dist/autosize.min.js"></script>
<?= $this->endSection() ?>