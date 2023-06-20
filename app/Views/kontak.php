<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<section class="banner">
    <img src="/images/contact.jpg" alt="banner">
    <div class="overlay">
        <div class="container">
            <h1>Kontak</h1>
        </div>
    </div>
</section>

<section class="main-section kontak">
    <div class="container">
        <h2 class="mb-3 fs-3 fw-semibold">Informasi Kontak</h2>
        <p class="mb-5 fw-medium">Jalan Mawar No.51 Dekat Mixue</p>

        <div class="fw-medium">
            <div class="d-flex align-items-center mb-4">
                <span class="iconify" data-icon="mdi:phone"></span>
                <p class="mb-0 ms-3">+6285318534145</p>
            </div>

            <div class="d-flex align-items-center">
                <span class="iconify" data-icon="mdi:envelope-outline"></span>
                <p class="mb-0 ms-3">perusahaan@gmail.com</p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>