<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicTransportRegulatorResponse extends Model
{
    public $fillable = [
        "department",
        "position",
        "department_authority_level",
        "difficulties_in_public_trans_impl",
        "wishes_recommendations_for_impl",
        "recommended_public_trans_type",
    ];
}
