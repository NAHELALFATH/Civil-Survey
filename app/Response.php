<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public function extra_data()
    {
        return $this->morphTo();
    }
}
