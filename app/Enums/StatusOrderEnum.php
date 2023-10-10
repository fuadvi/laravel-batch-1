<?php

namespace App\Enums;

enum StatusOrderEnum: string
{
    case SUCCESS = 'success';
    case PENDING = 'pending';
    case FAILED = 'failed';

    public static function values(): array
    {
        return [
            self::SUCCESS->value,
            self::PENDING->value,
            self::FAILED->value,
        ];
    }
}
