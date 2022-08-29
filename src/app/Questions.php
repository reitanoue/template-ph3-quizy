<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = ['image'];
    //
    public function choices()
    {
        return $this->hasMany('App\Choices','question_id');
    }
}
