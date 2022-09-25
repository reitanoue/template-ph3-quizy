<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = ['image','choice'];
    // protected $fillable = ['choice'];
    //
    public function choices()
    {
        return $this->hasMany('App\Choices','question_id');
    }
}
