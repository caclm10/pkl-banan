<div class="mb-3">
    <label for="<?= $id ?? $name ?>" class="form-label"><?= $label ?? ucfirst($name) ?></label>
    <textarea name="<?= $name ?>" id="<?= $id ?? $name ?>" class="form-control <?= getValidationErrorClass($name) ?>" data-rte><?= old($name, $value ?? '') ?></textarea>
    <?= getValidationErrorView($name) ?>
</div>