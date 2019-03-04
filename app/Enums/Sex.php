<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self male()
 * @method static self female()
 */
class Sex extends Enum
{
    const NAMES = [
        "male" => "Laki-Laki",
        "female" => "Perempuan",
    ];
}