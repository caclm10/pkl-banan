<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <a href="/admin/layanan" class="btn btn-outline-secondary">
            <span>
                <span class="iconify" data-icon="material-symbols:arrow-back-rounded"></span>
            </span>
            <span>Back</span>
        </a>
    </div>

    <form action="/admin/layanan" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control <?= getValidationErrorClass('nama') ?>" name="nama" id="nama" value="<?= old('nama') ?>">
            <?= getValidationErrorView('nama') ?>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control <?= getValidationErrorClass('deskripsi') ?>" data-autosize><?= old('deskripsi') ?></textarea>
            <?= getValidationErrorView('deskripsi') ?>
        </div>

        <div class="mb-3">
            <div>
                <label for="icon" class="form-label">Icon</label>
                (<a target="_blank" href="https://icon-sets.iconify.design/">Lihat</a>)
            </div>
            <input type="text" name="icon" id="icon" class="form-control <?= getValidationErrorClass('icon') ?>" value="<?= old('icon') ?>">
            <?= getValidationErrorView('icon') ?>
        </div>

        <div class="mb-3">
            <label for="iconKustom" class="form-label">Icon kustom</label>
            <input type="file" name="icon_kustom" id="iconKustom" class="form-control <?= getValidationErrorClass('icon_kustom') ?>" data-image-preview>
            <?= getValidationErrorView('icon_kustom') ?>
        </div>

        <div class="form-action">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('vendor-scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/autosize@5.0.2/dist/autosize.min.js"></script>
<?= $this->endSection() ?>