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



// nameにはルートパラメータを入れる（どこに飛ばしていいのか分からなくなるのを防ぐため）
Route::get(
    '/admin/questionAdmin/{big_question_id}',
    'AdminController@questionIndex'
)->name('admin.questionAdmin');


Route::get(
    '/admin/question/delete/{id}',
    'AdminController@questionDeleteIndex'
)->name('admin.question.delete');


Route::post(
    '/admin/question/delete/{id}',
    'AdminController@questionDelete'
);


Route::get(
    '/admin/question/edit/{id}',
    'AdminController@questionEditIndex'
)->name('admin.question.edit');

Route::post(
    '/admin/question/edit/{id}',
    'AdminController@questionEdit'
);

Route::get(
    '/admin/question/add/{id}',
    'AdminController@questionAddIndex'
)->name('admin.question.add');

Route::post(
    '/admin/question/add/{id}',
    'AdminController@questionAdd'
);
