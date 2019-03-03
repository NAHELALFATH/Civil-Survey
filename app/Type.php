<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $fillable = [
        'respondent_type', 'name'
    ];

    public function criteria()
    {
        return $this->hasMany(Criterion::class);
    }
}
