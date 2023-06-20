<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <?= view('components/add-button', ['instance' => 'admin']) ?>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $index => $admin) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><?= $admin['nama'] ?></td>
                        <td><?= $admin['email'] ?></td>
                        <td>
                            <?php if ($admin['email'] != auth()['email']) : ?>
                                <?= view('components/table-action', ['path' => 'admin', 'id' => $admin['id']]) ?>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>