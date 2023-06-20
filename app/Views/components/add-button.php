<div class="admin-main-action">
    <?php if (isset($backTo) && $backTo) : ?>
        <a href="<?= $backTo ?>" class="btn btn-outline-secondary me-3">
            <span>
                <span class="iconify" data-icon="material-symbols:arrow-back-rounded"></span>
            </span>
            <span>Back</span>
        </a>
    <?php endif ?>
    <a href="/admin/<?= $path ?? $instance ?>/create" class="btn btn-primary">
        + <?= ucwords(str_replace('-', ' ', $instance)) ?>
    </a>
</div>