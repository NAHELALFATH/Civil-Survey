<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    public $fillable = [
        "name"
    ];

    public function survey_datas()
    {
        return $this->hasMany(SurveyData::class);
    }

    public function sub_criterion()
    {
        return $this->belongsTo(SubCriterion::class);
    }

    public function getIsDeleteableAttribute()
    {
        $this->survey_data_count === 0;
    }
}
