<?php

use CodeIgniter\I18n\Time;

function dateFormat($str, $format)
{
    return Time::parse($str)->toLocalizedString($format);
}
