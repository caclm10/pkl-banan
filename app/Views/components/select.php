<?php
if (!isset($disabled)) {
    $disabled = false;
}
?>

<div class="mb-3">
    <label for="<?= $id ?? $name ?>" class="form-label"><?= $label ?? ucfirst($name) ?></label>
    <select type="<?= $type ?? "text" ?>" class="form-select <?= getValidationErrorClass($name) ?>" name="<?= $name ?>" id="<?= $id ?? $name ?>" <?= isset($value) ? (old($name) == $value ? 'selected' : '') : '' ?> <?= $disabled ? 'disabled' : '' ?>>
        <?php if (isset($options) && is_array($options) && count($options) > 0) : ?>
            <?php foreach ($options as $option) : ?>
                <option value="<?= $option['value'] ?>"><?= $option['label'] ?></option>
            <?php endforeach ?>
        <?php endif ?>
    </select>
    <?= getValidationErrorView($name) ?>

</div>