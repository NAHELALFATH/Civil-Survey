<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $fillable = [
        'respondent_type', 'name'
    ];

    protected $appends = ['is_deletable'];

    public function criteria()
    {
        return $this->hasMany(Criterion::class);
    }

    public function getIsDeletableAttribute()
    {
        return $this->criteria_count === 0;
    }
}
