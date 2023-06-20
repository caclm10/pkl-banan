<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKL Banan</title>

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,regular,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header class="navbar navbar-expand-lg bg-primary navbar-dark navbar-main">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/images/logo.png" alt="logo" width="80" height="80">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
                <div class="navbar-nav">
                    <a class="nav-link <?= url_is('/') ? 'active' : '' ?>" <?= url_is('/') ? 'aria-current="page"' : '' ?> href="/">Home</a>
                    <a class="nav-link <?= url_is('/tentang-kami') ? 'active' : '' ?>" <?= url_is('/tentang-kami') ? 'aria-current="page"' : '' ?> href="/tentang-kami">Tentang Kami</a>
                    <a class="nav-link <?= url_is('/proyek') ? 'active' : '' ?>" <?= url_is('/proyek') ? 'aria-current="page"' : '' ?> href="/proyek">Proyek</a>
                    <a class="nav-link <?= url_is('/pengumuman') ? 'active' : '' ?>" <?= url_is('/pengumuman') ? 'aria-current="page"' : '' ?> href="/pengumuman">Pengumuman</a>
                    <a class="nav-link <?= url_is('/kontak') ? 'active' : '' ?>" <?= url_is('/kontak') ? 'aria-current="page"' : '' ?> href="/kontak">Kontak</a>
                </div>
            </div>
        </div>
    </header>

    <main class="main">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="main-footer">
        <div class="container">
            <p class="mb-0">Rizqy Prima Utama</p>
        </div>
    </footer>

    <script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/fslightbox.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>