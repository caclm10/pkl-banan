<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<section id="mainCarousel" class="carousel slide carousel-fade main-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/images/slideshow-1.jpg" class="" alt="carousel-image">
        </div>
        <div class="carousel-item">
            <img src="/images/slideshow-2.jpg" class="" alt="carousel-image">
        </div>
        <div class="carousel-item">
            <img src="/images/slideshow-3.jpg" class="" alt="carousel-image">
        </div>
    </div>

    <div class="carousel-content container">
        <div class="carousel-content-wrap">
            <h1 class="fw-bold">CV. RIZQY PRIMA UTAMA</h1>
            <p class="fs-4 mb-0">Pusat Pelayanan Masyarakat Dalam Perencanaan Arsitektur dan Kontraktor yang
                Berpusat di
                Kalimantan Timur</p>
        </div>

        <div class="carousel-prev-wrap">
            <button class="carousel-control carousel-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-prev-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </span>
                <span class="visually-hidden">Previous</span>
            </button>
        </div>

        <div class="carousel-next-wrap">
            <button class="carousel-control carousel-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-next-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m8.25 4.5l7.5 7.5l-7.5 7.5" />
                    </svg>
                </span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    </div>
</section>

<section class="main-section we-do-section">
    <div class="container">
        <div class="section-header">
            <h2>Pekerjaan yang Kami Lakukan</h2>
            <p class="text-secondary pt-3">CV. Rizqy Prima Utama hadir untuk</p>
        </div>


        <div class="row row-cols-1 row-cols-lg-3 g-5 pt-5 text-center">
            <div class="col">
                <div class="box">
                    <div class="icon">
                        <img src="/images/truck.png">
                    </div>
                    <h3 class="pt-4 fs-2 fw-medium">Perdagangan</h3>
                    <p class="pt-3 desc">Ekspor, impor, dan antar pulau maupun tempat dengan bertindak sebagai agen, komisioner, grossir, supplier.</p>
                </div>
            </div>
            <div class="col">
                <div class="box">
                    <div class="icon">
                        <img src="/images/cart.png" alt="layanan-1">
                    </div>
                    <h3 class="pt-4 fs-2 fw-medium">Pengadaan</h3>
                    <p class="pt-3 desc">Menjalankan usaha dalam bidang pengadaan barang, dagangan material bangunan, distrubutor, serta produksi</p>
                </div>
            </div>
            <div class="col">
                <div class="box">
                    <div class="icon">
                        <img src="/images/box.png" alt="layanan-1">
                    </div>
                    <h3 class="pt-4 fs-2 fw-medium">Jasa Angkut</h3>
                    <p class="pt-3 desc">Jasa angkut barang dan penumpang, baik darat, laut, maupun udara </p>
                </div>
            </div>
            <div class="col">
                <div class="box">
                    <div class="icon">
                        <img src="/images/telcom.png" alt="layanan-1">
                    </div>
                    <h3 class="pt-4 fs-2 fw-medium">Telekomunikasi</h3>
                    <p class="pt-3 desc">Pelayanan jasa telekomunikasi, radio pager, telephone genggam, perbaikan maupun pemasangan </p>
                </div>
            </div>
            <div class="col">
                <div class="box">
                    <div class="icon">
                        <img src="/images/factory.png" alt="layanan-1">
                    </div>
                    <h3 class="pt-4 fs-2 fw-medium">Industri</h3>
                    <p class="pt-3 desc">Menjalankan usaha-usaha dalam bidang industri baik kecil maupun besar </p>
                </div>
            </div>
            <div class="col">
                <div class="box">
                    <div class="icon">
                        <img src="/images/cement.png" alt="layanan-1">
                    </div>
                    <h3 class="pt-4 fs-2 fw-medium">Kontaktor</h3>
                    <p class="pt-3 desc">Bertindak sebagai kontraktor atau sebagai sub-kontraktor termasuk perancangan, pengawasan, dan pemborongan </p>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="main-section about-section">
    <div class="container">
        <div class="row row-cols-1 row-cols-xl-2 gx-5 gx-xl-0 gy-5 gy-xl-0">
            <div class="col">
                <div class="left">
                    <div class="section-header">
                        <h2>Tentang Kami</h2>
                        <div class="desc">
                            Penjelasan mengenai perusahaan ini. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum repellat, vero excepturi maxime, ipsum sequi quibusdam nostrum architecto esse est deserunt blanditiis doloremque voluptates omnis voluptatum beatae veniam repellendus ex. Lorem ipsum dolor...
                        </div>
                    </div>

                    <div class="pt-3">
                        <a href="/tentang-kami" class="btn btn-primary btn-lg">Lebih lanjut</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="right">
                    <div class="img-wrapper">
                        <img src="/images/about.jpg" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="main-section project">
    <div class="container">
        <div class="section-header">
            <h2 class="fw-semibold">Proyek yang telah selesai</h2>
        </div>

        <div class="row row-cols-md-3 g-4 pt-5 project-list">
            <?php foreach ($projects as $project) : ?>
                <div class="col">
                    <div class="card project-list-item">
                        <img src="/<?= $project['path_gambar'] ?: 'images/366x140.png' ?>" class="card-img-top" alt="project-item">
                        <div class="card-body">
                            <h5 class="card-title"><?= $project['nama'] ?></h5>
                            <p class="card-text project-description"><?= $project['deskripsi'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <div class="d-flex justify-content-end mt-5">
            <a href="/proyek" class="text-decoration-none">Lihat Semua <span class="iconify" data-icon="material-symbols:double-arrow"></span></a>
        </div>
    </div>
</section>


<section class="main-section">
    <div class="container">
        <div class="section-header">
            <h2 class="fw-semibold">Ayo gabung bersama dengan yang lainnya!</h2>
        </div>

        <div id="reviewListCarousel" class="carousel slide review-list-carousel" data-bs-ride="carousel">
            <div class="carousel-inner shadow-lg">
                <div class="carousel-item shadow-lg active">
                    <div class="row row-cols-sm-2 shadow-lg rounded-3 review-list-item p-5">
                        <div class="col col-sm-4">
                            <div class="review-user-image">
                                <img src="https://xsgames.co/randomusers/avatar.php?g=female" alt="picture" class="">
                            </div>
                        </div>

                        <div class="col col-sm-8">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="quote-icon">
                                    <path fill="currentColor" d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054c.062-.372.166-.703.31-.992c.145-.29.331-.517.559-.683c.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992a4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054c.062-.372.166-.703.31-.992c.145-.29.331-.517.559-.683c.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992a4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                                </svg>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit voluptatum illum explicabo perferendis culpa a veritatis, laboriosam, voluptatem quis atque, est soluta ipsum molestiae vitae? Tenetur, maxime! Aperiam, sunt sapiente!
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae eaque obcaecati velit, rerum at, libero iusto maiores officiis aliquid laboriosam iure ea atque earum consectetur! Quisquam, quaerat minima. Vero, minus?
                                </p>

                                <h4 class="text-primary fs-5 mb-0">Dorothy Maskow</h4>
                                <h5 class="fs-6 fst-italic text-secondary">Pemilik Mall Doro</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row row-cols-sm-2 shadow-lg rounded-3 review-list-item p-5">
                        <div class="col col-sm-4">
                            <div class="review-user-image">
                                <img src="https://xsgames.co/randomusers/avatar.php?g=male" alt="picture" class="">
                            </div>
                        </div>

                        <div class="col col-sm-8">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="quote-icon">
                                    <path fill="currentColor" d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054c.062-.372.166-.703.31-.992c.145-.29.331-.517.559-.683c.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992a4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054c.062-.372.166-.703.31-.992c.145-.29.331-.517.559-.683c.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992a4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                                </svg>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit voluptatum illum explicabo perferendis culpa a veritatis, laboriosam, voluptatem quis atque, est soluta ipsum molestiae vitae? Tenetur, maxime! Aperiam, sunt sapiente!
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae eaque obcaecati velit, rerum at, libero iusto maiores officiis aliquid laboriosam iure ea atque earum consectetur! Quisquam, quaerat minima. Vero, minus?
                                </p>

                                <h4 class="text-primary fs-5 mb-0">Bister Nostan</h4>
                                <h5 class="fs-6 fst-italic text-secondary">Pemilik Apartemen Altin</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row row-cols-sm-2 shadow-lg rounded-3 review-list-item p-5">
                        <div class="col col-sm-4">
                            <div class="review-user-image">
                                <img src="https://xsgames.co/randomusers/avatar.php?g=female" alt="picture" class="">
                            </div>
                        </div>

                        <div class="col col-sm-8">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="quote-icon">
                                    <path fill="currentColor" d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054c.062-.372.166-.703.31-.992c.145-.29.331-.517.559-.683c.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992a4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054c.062-.372.166-.703.31-.992c.145-.29.331-.517.559-.683c.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992a4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                                </svg>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit voluptatum illum explicabo perferendis culpa a veritatis, laboriosam, voluptatem quis atque, est soluta ipsum molestiae vitae? Tenetur, maxime! Aperiam, sunt sapiente!
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae eaque obcaecati velit, rerum at, libero iusto maiores officiis aliquid laboriosam iure ea atque earum consectetur! Quisquam, quaerat minima. Vero, minus?
                                </p>

                                <h4 class="text-primary fs-5 mb-0">Syntia Jeselyn</h4>
                                <h5 class="fs-6 fst-italic text-secondary">Pemilik Bank Bergantung</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button class="carousel-control carousel-prev" type="button" data-bs-target="#reviewListCarousel" data-bs-slide="prev">
                    <span class="carousel-prev-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control carousel-next" type="button" data-bs-target="#reviewListCarousel" data-bs-slide="next">
                    <span class="carousel-next-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m8.25 4.5l7.5 7.5l-7.5 7.5" />
                        </svg>
                    </span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>