<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,regular,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="full-loader d-none" id="fullLoader">
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="admin-wrapper">
        <aside class="admin-sidebar" id="adminSidebar">
            <div class="p-4">
                <a href="#" class="text-decoration-none text-black fs-4 fw-medium">
                    Admin
                </a>
            </div>

            <nav class="menu">
                <?php foreach (sidebarMenus() as $menu) : ?>
                    <?php if (isset($menu['to'])) : ?>
                        <a href="<?= $menu['to'] ?>" class="menu-item <?= $menu['active'] ? 'active' : '' ?>" <?= $menu['active'] ? 'aria-current="page"' : '' ?>>
                            <span class="icon">
                                <span class="iconify" data-icon="<?= $menu['icon'] ?>"></span>
                            </span>
                            <span><?= $menu['name'] ?></span>
                        </a>
                    <?php else : ?>
                        <button type="button" class="menu-item <?= $menu['active'] ? 'active' : '' ?>" data-bs-toggle="collapse" data-bs-target="#<?= $menu['id'] ?>" aria-expanded="false" aria-controls="<?= $menu['id'] ?>">
                            <span class="icon">
                                <span class="iconify" data-icon="<?= $menu['icon'] ?>"></span>
                            </span>
                            <span><?= $menu['name'] ?></span>
                        </button>

                        <div class="collapse sub-menu-collapse <?= $menu['active'] ? 'show' : '' ?>" id="<?= $menu['id'] ?>">
                            <nav class="sub-menu">
                                <?php foreach ($menu['sub-menus'] as $subMenu) : ?>
                                    <a href="<?= $subMenu['to'] ?>" class="sub-menu-item <?= $subMenu['active'] ? 'active' : '' ?>" <?= $subMenu['active'] ? 'aria-current="page"' : '' ?>>
                                        <?= $subMenu['name'] ?>
                                    </a>
                                <?php endforeach ?>
                            </nav>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </nav>
        </aside>

        <div class="admin-container">
            <header class="admin-header">
                <form action="/logout" method="POST" class="d-none" id="logoutForm"></form>
                <div></div>
                <div class="dropdown">
                    <button class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Hi, <?= auth()['nama'] ?></span>
                        <span class="fs-5">
                            <span class="iconify" data-icon="material-symbols:expand-more-rounded"></span>
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/admin/akun">Akun</a></li>
                        <li><a class="dropdown-item" href="/admin/akun/password">Edit Password</a></li>
                        <li><button form="logoutForm" class="dropdown-item">Logout</button></li>
                    </ul>
                </div>
            </header>
        </div>

        <div class="admin-container">
            <?php if (hasNotif()) : ?>
                <div class="alert <?= getAlertNotifClass() ?> d-flex align-items-center" role="alert">
                    <span class="iconify me-2" data-icon="<?= getAlertNotifIcon() ?>"></span>
                    <div>
                        <?= getNotifMessage() ?>
                    </div>
                </div>
            <?php endif ?>
            <main>
                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>

    <script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?= $this->renderSection('vendor-scripts') ?>
    <script src="/js/script.js"></script>
</body>

</html>