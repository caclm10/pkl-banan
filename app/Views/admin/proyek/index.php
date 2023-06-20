<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <?= view('components/add-button', ['instance' => 'proyek']) ?>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $index => $project) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><?= $project['nama'] ?></td>
                        <td><?= $project['deskripsi'] ?></td>
                        <td>
                            <?= view('components/table-action', ['path' => 'proyek', 'id' => $project['id'], 'gambar' => true, 'pekerja' => true]) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>