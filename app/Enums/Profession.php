<?php

namespace App\Enums;

enum Profession: int
{
    case EMPLOYED = 1;
    case SELF_EMPLOYED = 2;
    case CIVIL_SERVANT = 3;
    case APPRENTICESHIP = 4;
    case STUDENT = 5;
    case PENSIONER = 6;
    case JOB_SEEKING = 7;

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }

    public function getText(): string
    {
        return match($this){
            self::EMPLOYED => 'Employed',
            self::SELF_EMPLOYED => 'Self Employed',
            self::CIVIL_SERVANT => 'Civil Servant',
            self::APPRENTICESHIP => 'Apprenticeship',
            self::STUDENT => 'Student',
            self::PENSIONER => 'Pensioner',
            self::JOB_SEEKING => 'Job Seeking',
        };
    }
}