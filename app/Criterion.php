<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    public function sub_criteria()
    {
        return $this->hasMany(SubCriterion::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
