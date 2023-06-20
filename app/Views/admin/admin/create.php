<?= $this->extend('layouts/admin-panel') ?>

<?= $this->section('content') ?>

<div class="admin-main">
    <div class="admin-main-action">
        <?= view('components/back-button', ['to' => '/admin/admin']) ?>
    </div>

    <form action="/admin/admin" method="POST">
        <?= view('components/input', ['name' => 'nama']) ?>

        <?= view('components/input', ['name' => 'email']) ?>

        <?= view('components/input', ['name' => 'password']) ?>

        <div>
            <button type="button" class="btn btn-outline-primary btn-sm" id="passwordGenerator">Generate</button>
        </div>

        <?= view('components/form-submit') ?>
    </form>

</div>

<?= $this->endSection() ?>

<?= $this->section('vendor-scripts') ?>
<script src="/js/tinymce/tinymce.min.js"></script>
<?= $this->endSection() ?>