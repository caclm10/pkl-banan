<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <a href="/admin/project-setup/projects/create" class="btn btn-primary">
            + Proyek
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskirpsi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $index => $project) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td>
                            <img src="/<?= $project['path_gambar'] ?>" class="img-table">
                        </td>
                        <td><?= $project['nama'] ?></td>
                        <td><?= $project['deskripsi'] ?></td>
                        <td>
                            <div class="table-action">
                                <a href="/admin/project-setup/projects/edit/<?= $project['id'] ?>" class="btn btn-primary btn-sm">
                                    <span class="iconify" data-icon="material-symbols:edit-outline-rounded"></span>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" data-delete-form="/admin/project-setup/projects/delete/<?= $project['id'] ?>">
                                    <span class="iconify" data-icon="material-symbols:delete-outline-rounded"></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>