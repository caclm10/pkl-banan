<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <form action="/admin/project-setup/general" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control <?= getValidationErrorClass('judul') ?>" value="<?= old('judul', $general['judul']) ?>">
            <?= getValidationErrorView('judul') ?>
        </div>

        <div class="mb-3">
            <label for="subJudul" class="form-label">Sub-judul</label>
            <input type="text" name="sub_judul" id="subJudul" class="form-control <?= getValidationErrorClass('sub_judul') ?>" value="<?= old('sub_judul', $general['sub_judul']) ?>">
            <?= getValidationErrorView('sub_judul') ?>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control <?= getValidationErrorClass('deskripsi') ?>" name="deskripsi" id="deskripsi"><?= old('deskripsi', $general['deskripsi']) ?></textarea>
            <?= getValidationErrorView('deskripsi') ?>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control <?= getValidationErrorClass('gambar') ?>" data-image-preview="<?= $general['path_gambar'] ?>">
            <?= getValidationErrorView('gambar') ?>
        </div>

        <div class="form-action">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('vendor-scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/autosize@5.0.2/dist/autosize.min.js"></script>
<script src="/js/tinymce/tinymce.min.js"></script>
<?= $this->endSection() ?>