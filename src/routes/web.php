<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\BigQuestions;
use Whoops\Run;

Route::get('/', function () {
    return view('hello.welcome');
});


Route::get(
    '/hello/quiz/{id}',
    'QuizyController@index'
);

Route::get(
    'admin/admin/index',
    'AdminController@index'
);
Route::get(
    '/admin/big_question/add',
    'AdminController@bigQuestionAddIndex'
);

Route::post(
    '/admin/big_question/add',
    'AdminController@bigQuestionAdd'
);

Route::get(
    '/admin/big_question/edit/{big_question_id}',
    'AdminController@bigQuestionEditIndex'
);

Route::post(
    '/admin/big_question/edit/{big_question_id}',
    'AdminController@bigQuestionEdit'
);

Route::get(
    '/admin/big_question/delete/{big_question_id}',
    'AdminController@bigQuestionDeleteIndex'
);

Route::post(
    '/admin/big_question/delete/{big_question_id}',
    'AdminController@bigQuestionDelete'
);
