<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicTransportOperatorResponse extends Model
{
    public $fillable = [
        "respondent_occupation",
        "is_transport_company_owner",
        "position_in_company",
        "duration_in_business",
        "company_monthly_revenue",
        "difficulties_in_operation",
        "wish_and_recommendations",
        "desired_types_of_public_transport",
    ];
}
