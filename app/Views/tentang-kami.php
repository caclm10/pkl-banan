<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<section class="banner">
    <img src="/images/about.jpg" alt="banner">
    <div class="overlay">
        <div class="container">
            <h1>Tentang Kami</h1>
        </div>
    </div>
</section>

<section class="main-section about">
    <div class="container">
        <h2 class="fw-semibold">Tentang</h2>
        <div class="description mb-5">
            <p><strong>&emsp;&emsp;Penjelasan</strong> mengenai perusahaan ini. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum repellat, vero excepturi maxime, ipsum sequi quibusdam nostrum architecto esse est deserunt blanditiis doloremque voluptates omnis voluptatum beatae veniam repellendus ex. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum repellat, vero excepturi maxime, ipsum sequi quibusdam nostrum architecto esse est deserunt blanditiis doloremque voluptates omnis voluptatum beatae veniam repellendus ex.</p>

            <p>&emsp;&emsp;Donec a orci <em>sit amet risus maximus</em> maximus ac at nisi. Curabitur ac neque id dui posuere vulputate et eu orci. Sed pharetra posuere placerat. Nullam quis aliquam nunc. Sed tempus dapibus nulla eget vestibulum. Nullam consectetur fringilla ornare. Nullam eu nisi in sem interdum faucibus. Etiam cursus nibh sed massa mattis, vel ornare nunc convallis. Quisque et cursus elit. Curabitur pulvinar, diam quis ultrices cursus, nibh nisi vehicula dolor, non mollis nunc nisi in urna. Sed vestibulum, metus nec luctus scelerisque, augue nulla dapibus metus, sed placerat sapien turpis ac enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed sollicitudin condimentum massa, at pharetra neque semper at. Vivamus velit tortor, varius porta enim quis, sollicitudin auctor lacus.</p>
        </div>

        <h2 class="fw-semibold">Tim Kami</h2>

        <div class="row row-cols-md-3 g-4 team-list">
            <?php foreach ($teams as $team) : ?>
                <div class="col">
                    <div class="team-list-item">
                        <div class="team-picture">
                            <img src="/<?= $team['path_gambar'] ?>" alt="picture" class="">
                        </div>
                        <div class="team-header">
                            <h4 class="mb-0 text-primary"><?= $team['nama'] ?></h4>
                            <h5 class="fs-6 mt-0"><?= $team['jabatan'] ?></h5>
                        </div>
                        <p class="pt-3"><?= $team['deskripsi'] ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>