<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<section class="main-section anouncement">
    <div class="container">
        <h1 class="fs-3 fw-semibold">Pengumuman</h1>

        <?php foreach ($announcements as $announcement) : ?>
            <div class="mb-5">
                <p class="date"><?= dateFormat($announcement['tanggal_dibuat'], 'ee MMMM, yyyy') ?></p>
                <div class="content">
                    <?= $announcement['isi'] ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>

<?= $this->endSection() ?>