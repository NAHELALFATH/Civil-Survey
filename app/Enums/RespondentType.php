<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self public_transport_user()
 * @method static self public_transport_operator_investor()
 * @method static self public_transport_regulator()
 */
class RespondentType extends Enum
{
    const NAMES = [
        "public_transport_user" => "Pengguna Angkutan Umum",
        "public_transport_operator_investor" => "Operator / Investor Angkutan Umum",
        "public_transport_regulator" => "Pemerintah / Regulator Angkutan Umum"
    ];
}