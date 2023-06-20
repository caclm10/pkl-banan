<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <?= view('components/back-button', ['to' => '/admin/proyek']) ?>
    </div>

    <form action="/admin/proyek/<?= $project['id'] ?>" method="POST">
        <?= formMethod('PUT') ?>

        <?= view('components/input', ['name' => 'nama', 'value' => $project['nama']]) ?>

        <?= view('components/textarea', ['name' => 'deskripsi', 'value' => $project['deskripsi']]) ?>

        <?= view('components/input', ['name' => 'tanggal_mulai', 'type' => 'date', 'label' => 'Tanggal Mulai', 'value' => date('Y-m-d', strtotime($project['tanggal_mulai']))]) ?>

        <?= view('components/input', ['name' => 'tanggal_selesai', 'type' => 'date', 'label' => 'Tanggal Selesai', 'value' => date('Y-m-d', strtotime($project['tanggal_selesai']))]) ?>

        <?= view('components/form-submit') ?>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('vendor-scripts') ?>
<script src="/js/autosize.min.js"></script>
<?= $this->endSection() ?>