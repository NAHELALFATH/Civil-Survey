<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self not_important()
 * @method static self less_important()
 * @method static self moderate()
 * @method static self more_important()
 * @method static self very_important()
 */
class ResponseLevel extends Enum
{
    protected static $map = [
        "not_important" => "Tidak Penting",
        "less_important" => "Kurang Penting",
        "moderate" => "Moderat",
        "more_important" => "Cukup Penting",
        "very_important" => "Sangat Penting",
    ];
}