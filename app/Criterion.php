<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    public $fillable = [
        "type_id",
        "name",
    ];

    public function sub_criteria()
    {
        return $this->hasMany(SubCriterion::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function getIsDeletableAttribute()
    {
        return $this->sub_criteria_count === 0;
    }
}
