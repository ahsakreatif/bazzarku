<?php

namespace App\Constants;

class StatusSubmit
{
    const START = 'start';
    const PENDING = 'pending';
    const PAID = 'paid';
    const PARTLY = 'partly';
    const FINISHED = 'finished';
    const CANCELED = 'canceled';
    const ERROR = 'error';
    const REJECTED = 'rejected';

    const UNDEFINED = 'undefined';

    public static $status_labels = [
        self::START => 'Start',
        self::PENDING => 'Waiting Payment',
        self::PAID => 'Paid',
        self::PARTLY => 'Partly Paid',
        self::FINISHED => 'Success',
        self::CANCELED => 'Cancel',
        self::ERROR => 'Error',
        self::REJECTED => 'Rejected',
    ];

    public static $status_colors = [
        self::START => 'gray',
        self::PENDING => 'warning',
        self::PAID => 'info',
        self::PARTLY => 'info',
        self::FINISHED => 'success',
        self::CANCELED => 'danger',
        self::ERROR => 'danger',
        self::REJECTED => 'danger',
        self::UNDEFINED => 'gray'
    ];

    public static function getLabel($status)
    {
      return self::$status_labels[$status] ?? 'Undefined';
    }

    public static function getColor($status)
    {
      return self::$status_colors[$status] ?? 'gray';
    }

    public static function matchColor($status)
    {
        return match ($status) {
            self::START => 'gray',
            self::PENDING => 'warning',
            self::PAID => 'info',
            self::PARTLY => 'info',
            self::FINISHED => 'success',
            self::CANCELED => 'danger',
            self::ERROR => 'danger',
            self::REJECTED => 'danger',
            default => 'gray',
        };
    }
}
