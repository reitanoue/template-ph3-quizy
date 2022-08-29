<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choices extends Model
{
    protected $fillable = ['name','question_id','valid'];

    //
    public function questions()
    {
        return $this->belongsTo('App\Questions');
    }
}
