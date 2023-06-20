<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <form action="/admin/kontak" method="POST">
        <?= formMethod('PUT') ?>

        <?= view('components/input', ['name' => 'email', 'value' => $contact['email']]) ?>

        <div class="mb-3">
            <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
            <div class="input-group">
                <span class="input-group-text" id="numberPrefix">+62</span>
                <input type="text" class="form-control <?= getValidationErrorClass('nomor_telepon') ?>" name="nomor_telepon" id="nomorTelepon" aria-describedby="numberPrefix" value="<?= old('nomor_telepon', $contact['nomor_telepon']) ?>">
                <?= getValidationErrorView('nomor_telepon') ?>
            </div>
        </div>

        <?= view('components/textarea', ['name' => 'alamat', 'value' => $contact['alamat']]) ?>

        <?= view('components/form-submit') ?>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('vendor-scripts') ?>
<script src="/js/autosize.min.js"></script>
<script src="https://unpkg.com/imask"></script>
<?= $this->endSection() ?>