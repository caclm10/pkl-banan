<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main bg-transparent p-0">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <div class="col">
            <a class="card h-100" href="/admin/proyek">
                <div class="card-body">
                    <h4 class="mb-0">Proyek</h4>
                    <p class="fs-2 mb-0"><?= $count['project'] ?></p>
                </div>
            </a>
        </div>
        <div class="col">
            <a class="card h-100" href="/admin/pengumuman">
                <div class="card-body">
                    <h4 class="mb-0">Pengumuman</h4>
                    <p class="fs-2 mb-0"><?= $count['announcement'] ?></p>
                </div>
            </a>
        </div>
        <div class="col">
            <a class="card h-100" href="/admin/admin">
                <div class="card-body">
                    <h4 class="mb-0">Admin</h4>
                    <p class="fs-2 mb-0"><?= $count['admin'] ?></p>
                </div>
            </a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>