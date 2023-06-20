<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<!-- Project Detail Modal -->
<div class="modal fade" id="projectDetailModal" tabindex="-1" aria-labelledby="projectDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="projectDetailModalLabel">Proyek</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="mainProjectDetail">
                    <div class="project-detail-image mb-4">
                        <img src="/images/1106x204.png" alt="" class="img-fluid" id="projectDetailModalImage">
                    </div>

                    <h5>Tanggal</h5>
                    <p id="tanggalProyek"></p>

                    <h5>Deskripsi</h5>
                    <p id="deskripsiProyek"></p>

                    <h5 class="mb-4">Pekerja</h5>
                    <div class="row row-cols-md-3 g-4 team-list" id="pekerjaProyek">
                    </div>
                </div>
                <div id="loaderProjectDetail" class="d-none">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<section class="banner">
    <img src="/images/project.jpg" alt="banner">
    <div class="overlay">
        <div class="container">
            <h1>Proyek Kami</h1>
        </div>
    </div>
</section>

<section class="main-section project">
    <div class="container">
        <h2 class="fw-semibold">Proyek yang telah selesai</h2>

        <p class="desc">Pallamco laboris nisi ut aliquip ex ea commodo consequat.</p>

        <div class="d-flex justify-content-end">
            <select class="form-select form-select-sm" aria-label="Sort Select" id="sortSelect" style="max-width:150px">
                <option value="" selected>Urutkan</option>
                <option value="tanggal_mulai">Tanggal Mulai</option>
                <option value="tanggal_selesai">Tanggal Selesai</option>
                <option value="nama">Nama</option>
            </select>
        </div>
        <div class="row row-cols-md-3 g-4 pt-3 project-list" data-project-list="">
            <?php foreach ($projects as $project) : ?>
                <div class="col" data-sort='<?= json_encode($project) ?>'>
                    <div class="card project-list-item" data-bs-toggle="modal" data-bs-target="#projectDetailModal" data-project-id="<?= $project['id'] ?>">
                        <img src="/<?= $project['path_gambar'] ?: 'images/366x140.png' ?>" class="card-img-top" alt="project-item">
                        <div class="card-body">
                            <h5 class="card-title"><?= $project['nama'] ?></h5>
                            <p class="card-text text-secondary"><?= dateFormat($project['tanggal_mulai'], 'dd MMMM yyyy') ?> - <?= dateFormat($project['tanggal_selesai'], 'dd MMMM yyyy') ?></p>
                            <p class="card-text project-description"><?= $project['deskripsi'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>