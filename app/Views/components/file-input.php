<div class="mb-3">
    <label for="<?= $id ?? $name ?>" class="form-label">
        <?= $label ?? ucfirst($name) ?>
    </label>

    <input type="file" name="<?= $name ?>" id="<?= $id ?? $name ?>" class="form-control <?= getValidationErrorClass($name) ?>" data-image-preview="<?= $value ?? null ?>" accept="<?= isset($isImage) && $isImage ? 'image/*' : '*/*' ?>">
    <?= getValidationErrorView($name) ?>
</div>