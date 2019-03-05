<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    public function survey_datas()
    {
        return $this->hasMany(SurveyData::class);
    }

    public function getIsDeleteableAttribute()
    {
        $this->survey_data_count === 0;
    }
}
