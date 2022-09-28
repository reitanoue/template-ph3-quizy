<?php

namespace App\Http\Controllers;

use App\BigQuestions;
use Illuminate\Http\Request;

class QuizyController extends Controller
{
    public function index($id)
    {
        $big_question = BigQuestions::find($id);

        return view('hello.quiz', compact('id', 'big_question'));
    }
}
