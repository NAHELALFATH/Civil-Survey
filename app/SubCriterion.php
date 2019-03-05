<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCriterion extends Model
{
    public $fillable = [
        "criterion_id",
        "name",
    ];

    public function alternatives()
    {
        return $this->hasMany(Alternative::class);
    }

    public function criterion()
    {
        return $this->belongsTo(Criterion::class);
    }

    public function getIsDeletableAttribute()
    {
        return $this->alternatives_count === 0;
    }
}
