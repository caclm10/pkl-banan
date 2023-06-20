<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <a href="/admin/about-setup/misi" class="btn btn-outline-secondary">
            <span>
                <span class="iconify" data-icon="material-symbols:arrow-back-rounded"></span>
            </span>
            <span>Back</span>
        </a>
    </div>

    <form action="/admin/about-setup/misi" method="POST">
        <div class="mb-3">
            <label for="konten" class="form-label">Konten</label>
            <textarea name="konten" id="konten" class="form-control <?= getValidationErrorClass('konten') ?>" data-autosize><?= old('konten') ?></textarea>
            <?= getValidationErrorView('konten') ?>
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