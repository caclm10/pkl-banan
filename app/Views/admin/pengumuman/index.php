<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <?= view('components/add-button', ['instance' => 'pengumuman']) ?>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Isi</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($announcements as $index => $announcement) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td>
                            <div class="line-clamp-3">
                                <?= $announcement['isi'] ?>
                            </div>
                        </td>
                        <td><?= dateFormat($announcement['tanggal_dibuat'], 'ee MMMM, yyyy') ?></td>
                        <td>
                            <?= view('components/table-action', ['path' => 'pengumuman', 'id' => $announcement['id']]) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>