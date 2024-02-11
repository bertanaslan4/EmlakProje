<?php

namespace App\Enums;

enum ApplicationStatus: int
{
    case NEW = 1;
    case APPROVED = 2;
    case UNAPPROVED = 3;

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }

    public function getText(): string
    {
        return match($this){
            self::NEW => 'New Application',
            self::APPROVED => 'Approved',
            self::UNAPPROVED => 'Unapproved',
        };
    }

    public function getBadge(): string
    {
        return match($this){
            self::NEW => 'badge badge-light-primary',
            self::APPROVED => 'badge badge-light-success',
            self::UNAPPROVED => 'badge badge-light-danger',
        };
    }
}