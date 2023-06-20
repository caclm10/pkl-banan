<div class="table-action">
    <?php if (isset($pekerja) && $pekerja) : ?>
        <a href="/admin/<?= $path ?>/<?= $id ?>/pekerja" class="btn btn-info btn-sm">
            <span class="iconify" data-icon="fluent-emoji-high-contrast:construction-worker"></span>
        </a>
    <?php endif ?>
    <?php if (isset($gambar) && $gambar) : ?>
        <a href="/admin/<?= $path ?>/<?= $id ?>/gambar" class="btn btn-info btn-sm">
            <span class="iconify" data-icon="fluent:image-edit-16-regular"></span>
        </a>
    <?php endif ?>

    <a href="/admin/<?= $path ?>/<?= $id ?>/edit" class="btn btn-primary btn-sm">
        <span class="iconify" data-icon="material-symbols:edit-outline-rounded"></span>
    </a>
    <button type="button" class="btn btn-danger btn-sm" data-delete-form="/admin/<?= $path ?>/<?= $id ?>">
        <span class="iconify" data-icon="material-symbols:delete-outline-rounded"></span>
    </button>
</div>