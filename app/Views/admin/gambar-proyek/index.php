<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <a href="/admin/proyek/<?= $project['id'] ?>/edit" class="btn btn-outline-secondary me-3">
            <span>
                <span class="iconify" data-icon="material-symbols:arrow-back-rounded"></span>
            </span>
            <span>Back</span>
        </a>
        <button class="btn btn-primary" id="inputGambarLabel" data-proyek-id="<?= $project['id'] ?>">
            + Gambar
        </button>

        <input type="file" name="gambar" id="gambar" class="d-none" accept="image/*">
    </div>

    <h1 class="fs-3 mb-4">Gambar Proyek <?= $project['nama'] ?></h1>

    <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 project-image-list" data-sortable-id="projectImageList" data-project-id="<?= $project['id'] ?>">
        <?php foreach ($projectImages as $projectImage) : ?>
            <div class="col" data-image-id="<?= $projectImage['id'] ?>">
                <div class="project-image-list-item">
                    <img src="/<?= $projectImage['path_gambar'] ?>" alt="project">

                    <div class="project-image-list-item-action">
                        <button class="btn btn-link btn-drag">
                            <span class="iconify" data-icon="mdi:drag"></span>
                        </button>
                        <button class="btn btn-link text-danger" data-image-id="<?= $projectImage['id'] ?>">
                            <span class="iconify" data-icon="mdi:delete"></span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection() ?>