<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    //
    public function choices()
    {
        return $this->hasMany('App\Choices','question_id');
    }
}
