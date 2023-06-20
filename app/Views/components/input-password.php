<div class="mb-3">
    <label for="<?= $id ?? $name ?>" class="form-label"><?= $label ?? ucfirst($name) ?></label>
    <input type="password" class="form-control <?= getValidationErrorClass($name) ?>" name="<?= $name ?>" id="<?= $id ?? $name ?>">
    <?= getValidationErrorView($name) ?>

</div>