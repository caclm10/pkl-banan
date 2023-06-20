<?php

namespace App\Libraries;

class Notif
{
    const SUCCESS = 'success';
    const ERROR = 'error';
    const ALERT_SUCCESS_CLASS = 'alert-success';
    const ALERT_ERROR_CLASS = 'alert-danger';
    const ALERT_SUCCESS_ICON = 'mdi:success-circle-outline';
    const ALERT_ERROR_ICON = 'material-symbols:error-outline-rounded';

    public $message = '';
    public $type = '';

    public function __construct($instance, $event)
    {
        $this->setMessage($instance, $event);
    }

    private function setMessage($instance, $event)
    {
        switch ($event) {
            case 'saved':
                $this->message = "Data {$instance} berhasil disimpan.";
                $this->type = self::SUCCESS;
                break;

            case 'deleted':
                $this->message = "Data {$instance} berhasil dihapus.";
                $this->type = self::SUCCESS;
                break;
        }
    }
}
