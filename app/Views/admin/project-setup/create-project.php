<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <a href="/admin/project-setup/projects" class="btn btn-outline-secondary">
            <span>
                <span class="iconify" data-icon="material-symbols:arrow-back-rounded"></span>
            </span>
            <span>Back</span>
        </a>
    </div>

    <form action="/admin/project-setup/projects" method="POST" enctype="multipart/form-data">
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
            <label for="iconKustom" class="form-label">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control <?= getValidationErrorClass('gambar') ?>" data-image-preview>
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
<?= $this->endSection() ?>