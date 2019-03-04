<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyData extends Model
{
    public $fillable = [
        "rating",
        "type_id",
        "criterion_id",
        "sub_criterion_id",
        "alternative_id",
        "response_id"
    ];
}
