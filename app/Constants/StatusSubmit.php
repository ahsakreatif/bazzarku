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
        self::START => 'gray-500',
        self::PENDING => 'yellow-500',
        self::PAID => 'green-500',
        self::PARTLY => 'green-700',
        self::FINISHED => 'blue-500',
        self::CANCELED => 'gray-500',
        self::ERROR => 'red-500',
        self::REJECTED => 'red-500',
        self::UNDEFINED => 'gray-500'
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
