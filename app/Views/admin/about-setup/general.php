<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <form action="/admin/about-setup/general" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control <?= getValidationErrorClass('judul') ?>" value="<?= old('judul', $general['judul']) ?>">
            <?= getValidationErrorView('judul') ?>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control <?= getValidationErrorClass('isi') ?>" name="isi" id="isi" data-rte><?= old('isi', $general['isi']) ?></textarea>
            <?= getValidationErrorView('isi') ?>
        </div>

        <div class="mb-3">
            <label for="visi" class="form-label">Visi</label>
            <textarea name="visi" id="visi" class="form-control <?= getValidationErrorClass('visi') ?>" data-autosize><?= old('visi', $general['visi']) ?></textarea>
            <?= getValidationErrorView('visi') ?>
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