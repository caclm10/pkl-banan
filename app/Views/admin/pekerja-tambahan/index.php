<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <?= view('components/add-button', ['instance' => 'pekerja-tambahan']) ?>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($workers as $index => $worker) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td>
                            <img src="<?= $worker['path_gambar'] ? '/' . $worker['path_gambar'] : '/images/person-placeholder.jpg' ?>" alt="<?= $worker['nama'] ?>" style="max-width:70px;">
                        </td>
                        <td><?= $worker['nama'] ?></td>
                        <td><?= $worker['jabatan'] ?></td>
                        <td>
                            <?= view('components/table-action', ['path' => 'pekerja-tambahan', 'id' => $worker['id']]) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>