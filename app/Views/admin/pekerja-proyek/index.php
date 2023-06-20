<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<!-- Modal -->
<div class="modal fade" id="addWorkerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addWorkerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addWorkerModalLabel">Tambah Pekerja</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/proyek/<?= $project['id'] ?>/pekerja" id="addWorkerForm">
                    <?= view('components/select', ['name' => 'tipe', 'options' => [
                        ['value' => 'tim', 'label' => 'Tim'],
                        ['value' => 'pekerja_tambahan', 'label' => 'Pekerja Tambahan']
                    ]]) ?>

                    <?= view('components/select', ['name' => 'pekerja', 'options' => []]) ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="addWorkerForm">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="admin-main">
    <div class="admin-main-action">
        <a href="/admin/proyek/<?= $project['id'] ?>/edit" class="btn btn-outline-secondary me-3">
            <span>
                <span class="iconify" data-icon="material-symbols:arrow-back-rounded"></span>
            </span>
            <span>Back</span>
        </a>
        <button class="btn btn-primary" data-proyek-id="<?= $project['id'] ?>" data-bs-toggle="modal" data-bs-target="#addWorkerModal" data-project-id="<?= $project['id'] ?>">
            + Pekerja
        </button>
    </div>

    <h1 class="fs-3 mb-4">Pekerja Proyek <?= $project['nama'] ?></h1>

    <div class="row row-cols-md-3 g-4 team-list" id="teamList" data-project-id="<?= $project['id'] ?>">
        <?php foreach ($teamWorkers as $worker) : ?>
            <div class="col" data-team-workers="">
                <div class="team-list-item">
                    <div class="team-picture">
                        <img src="/<?= $worker["path_gambar"] ?>" alt="picture" class="">
                        <button type="button" class="btn text-danger btn-link btn-delete" data-delete-worker-id="<?= $worker['id'] ?>">
                            <span class="iconify" data-icon="mdi:delete"></span>
                        </button>
                    </div>
                    <div class="team-header">
                        <h4 class="mb-0 text-primary"><?= $worker['nama'] ?></h4>
                        <h5 class="fs-6 mt-0"><?= $worker['jabatan'] ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

        <?php foreach ($additionalWorkers as $worker) : ?>
            <div class="col" data-additional-workers="">
                <div class="team-list-item">
                    <div class="team-picture">
                        <img src="/<?= $worker["path_gambar"] ?>" alt="picture" class="">
                        <button type="button" class="btn text-danger btn-link btn-delete" data-delete-worker-id="<?= $worker['id'] ?>">
                            <span class="iconify" data-icon="mdi:delete"></span>
                        </button>
                    </div>
                    <div class="team-header">
                        <h4 class="mb-0 text-primary"><?= $worker['nama'] ?></h4>
                        <h5 class="fs-6 mt-0"><?= $worker['jabatan'] ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

    </div>
</div>


<?= $this->endSection() ?>