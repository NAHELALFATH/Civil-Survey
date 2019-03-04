<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicTransportUserResponse extends Model
{
    const STATE_USER = "is_public_transport_user";
    const STATE_NOT_USER = "not_public_transport_user";

    const STATES = [
        self::STATE_USER, self::STATE_NOT_USER
    ];

    public $fillable = [
        "respondent_occupation",
        "respondent_monthly_revenue",
        "is_public_transport_user",
        "public_transport_usage_duration",
        "public_transport_usage_purpose",
        "desired_public_transport_type",
        "public_transport_disuse_reason",
    ];

    public function response()
    {
        return $this->morphOne(Response::class, 'extra_data');
    }
}
