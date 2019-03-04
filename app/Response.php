<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public $fillable = [
        "respondent_name",
        "respondent_sex",
        "respondent_age",
        "respondent_address",
    ];

    public function extra_data()
    {
        return $this->morphTo();
    }
}
