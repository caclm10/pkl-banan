<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <a href="/admin/about-setup/misi/create" class="btn btn-primary">
            + Misi
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Konten</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($misi as $index => $m) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><?= $m['konten'] ?></td>
                        <td>
                            <div class="table-action">
                                <a href="/admin/about-setup/misi/edit/<?= $m['id'] ?>" class="btn btn-primary btn-sm">
                                    <span class="iconify" data-icon="material-symbols:edit-outline-rounded"></span>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" data-delete-form="/admin/about-setup/misi/delete/<?= $m['id'] ?>">
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