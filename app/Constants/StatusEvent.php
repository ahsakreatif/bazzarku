<?php

namespace App\Constants;

class StatusEvent
{

    const DRAFT = 'draft';
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    const EXPIRED = 'expired';
    const FINISHED = 'finished';
    const CANCELED = 'canceled';

    const UNDEFINED = 'undefined';

    public static $status_labels = [
        self::DRAFT => 'Draft',
        self::ACTIVE => 'Active',
        self::INACTIVE => 'Inactive',
        self::EXPIRED => 'Expired',
        self::FINISHED => 'Finished',
        self::CANCELED => 'Canceled'
    ];

    public static $status_colors = [
        self::DRAFT => 'gray',
        self::ACTIVE => 'success',
        self::INACTIVE => 'warning',
        self::EXPIRED => 'danger',
        self::FINISHED => 'success',
        self::CANCELED => 'danger',
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
}
