<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCriterion extends Model
{
    public function alternatives()
    {
        return $this->hasMany(Alternative::class);
    }

    public function criterion()
    {
        return $this->belongsTo(Criterion::class);
    }
}
