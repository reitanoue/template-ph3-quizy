<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigQuestions extends Model
{
    protected $fillable = ['name'];
    //
    public function questions()
    {
        return $this->hasMany('App\Questions','big_question_id');
        
    }
}
