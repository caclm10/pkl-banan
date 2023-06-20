<?php

use App\Libraries\Notif;

function setNotif($instance, $event)
{
    $notif = new Notif($instance, $event);

    session()->setFlashdata('notif', [
        'message' => $notif->message,
        'type' => $notif->type
    ]);
}

function hasNotif()
{
    return session()->has('notif');
}

function isSuccessNotif()
{
    return hasNotif() && session()->get('notif')['type'] == Notif::SUCCESS;
}

function isErrorNotif()
{
    return hasNotif() && session()->get('notif')['type'] == Notif::ERROR;
}

function getNotifMessage()
{
    return hasNotif() ? session()->get('notif')['message'] : '';
}

function getAlertNotifClass()
{
    if (isSuccessNotif()) return Notif::ALERT_SUCCESS_CLASS;
    else if (isErrorNotif()) return Notif::ALERT_ERROR_CLASS;
}

function getAlertNotifIcon()
{
    if (isSuccessNotif()) return Notif::ALERT_SUCCESS_ICON;
    else if (isErrorNotif()) return Notif::ALERT_ERROR_ICON;
}
