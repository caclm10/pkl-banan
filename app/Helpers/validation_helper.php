<?php

function setValidationErrors($data)
{
    session()->setFlashdata('_ci_validation_errors', $data);
}

function hasValidationError($name)
{
    return session()->has('_ci_validation_errors') && isset(session()->get('_ci_validation_errors')[$name]);
}

function getValidationError($name)
{
    return session()->get('_ci_validation_errors')[$name];
}

function getValidationErrorClass($name)
{
    return hasValidationError($name) ? 'is-invalid' : '';
}

function getValidationErrorView($name)
{
    if (hasValidationError($name)) {
        $error = getValidationError($name);
        return '<div class="invalid-feedback">' . $error . '</div>';
    }
}
