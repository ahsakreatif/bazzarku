<?php

namespace App\Constants;

class TopupStatus
{
    const START = '100';
    const PENDING = '110';
    const PAID = '200';
    const PARTLY = '210';
    const FINISHED = '300';
    const CANCELED = '400';
    const ERROR = '500';
    const REJECTED = '510';

    const UNDEFINED = '000';

    public static $status_labels = [
        self::START => 'Start',
        self::PENDING => 'Menunggu Pembayaran',
        self::PAID => 'Lunas',
        self::PARTLY => 'Lunas Sebagian',
        self::FINISHED => 'Success',
        self::CANCELED => 'Batal',
        self::ERROR => 'Kesalahan',
        self::REJECTED => 'Ditolak',
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
}
