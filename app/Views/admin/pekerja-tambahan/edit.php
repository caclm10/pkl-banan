<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <?= view('components/back-button', ['to' => '/admin/pekerja-tambahan']) ?>
    </div>

    <form action="/admin/pekerja-tambahan/<?= $worker['id'] ?>" method="POST" enctype="multipart/form-data">
        <?= formMethod('PUT') ?>

        <?= view('components/input', ['name' => 'nama', 'value' => $worker['nama']]) ?>

        <?= view('components/input', ['name' => 'jabatan', 'value' => $worker['jabatan']]) ?>

        <?= view('components/file-input', ['name' => 'gambar', 'isImage' => true, 'value' => $worker['path_gambar']]) ?>

        <?php if ($worker['path_gambar']) : ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="hapusGambar" name="hapus_gambar">
                <label class="form-check-label" for="hapusGambar">
                    Hapus Gambar?
                </label>
            </div>
        <?php endif ?>

        <?= view('components/form-submit') ?>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('vendor-scripts') ?>
<script src="/js/autosize.min.js"></script>
<?= $this->endSection() ?>