<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>
<div class="admin-main">
    <?= view('components/add-button', ['path' => 'tentang-kami/misi', 'instance' => 'misi']) ?>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Isi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($missions as $index => $mission) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><?= $mission['isi'] ?></td>
                        <td><?= view('components/table-action', ['id' => $mission['id'], 'path' => 'tentang-kami/misi']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('vendor-scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/autosize@5.0.2/dist/autosize.min.js"></script>
<?= $this->endSection() ?>