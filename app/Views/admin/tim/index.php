<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <?= view('components/add-button', ['instance' => 'tim']) ?>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teams as $index => $team) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><img src="<?= '/' . $team['path_gambar'] ?>" alt="<?= $team['nama'] ?>" style="max-width:70px;"></td>
                        <td><?= $team['nama'] ?></td>
                        <td><?= $team['jabatan'] ?></td>
                        <td><?= $team['deskripsi'] ?></td>
                        <td>
                            <?= view('components/table-action', ['path' => 'tim', 'id' => $team['id']]) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>