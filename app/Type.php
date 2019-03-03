<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $fillable = [
        'name'
    ];

    public function criteria()
    {
        return $this->hasMany(Criterion::class);
    }
}
