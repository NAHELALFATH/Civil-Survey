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

    public function response()
    {
        return $this->morphOne(Response::class, 'extra_data');
    }
}
