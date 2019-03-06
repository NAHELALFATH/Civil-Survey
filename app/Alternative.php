<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    public $fillable = [
        "name", "sub_criterion_id"
    ];

    public $appends = ["is_deletable"];

    public function survey_datas()
    {
        return $this->hasMany(SurveyData::class);
    }

    public function sub_criterion()
    {
        return $this->belongsTo(SubCriterion::class);
    }

    public function getIsDeletableAttribute()
    {
        return $this->survey_datas_count === 0;
    }
}
