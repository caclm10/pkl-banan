<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <a href="/admin/layanan/create" class="btn btn-primary">
            + Layanan
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskirpsi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $index => $service) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td>
                            <?php if ($service['path_icon_kustom']) : ?>
                                <img src="/<?= $service['path_icon_kustom'] ?>" class="img-table">
                            <?php else : ?>
                                <span class="icon-table">
                                    <span class="iconify" data-icon="<?= $service['icon'] ?>"></span>
                                </span>
                            <?php endif ?>
                        </td>
                        <td><?= $service['nama'] ?></td>
                        <td><?= $service['deskripsi'] ?></td>
                        <td><?= view('components/table-action', ['id' => $service['id'], 'path' => 'layanan']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>