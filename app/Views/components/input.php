<?php
if (!isset($disabled)) {
    $disabled = false;
}
?>

<div class="mb-3">
    <label for="<?= $id ?? $name ?>" class="form-label"><?= $label ?? ucfirst($name) ?></label>
    <input type="<?= $type ?? "text" ?>" class="form-control <?= getValidationErrorClass($name) ?>" name="<?= $name ?>" id="<?= $id ?? $name ?>" value="<?= old($name, $value ?? '') ?>" <?= $disabled ? 'disabled' : '' ?>>
    <?= getValidationErrorView($name) ?>

</div>