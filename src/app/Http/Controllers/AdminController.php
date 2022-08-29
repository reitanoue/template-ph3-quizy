<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminUser;
use App\BigQuestions;
use App\Questions;
use App\Choices;

class AdminController extends Controller
{
    //東京・広島の難読地名クイズが表示されてほしい
    public function index()
    {
        $big_questions = BigQuestions::all();
        $questions = Questions::all();
        return view('admin.admin', compact('big_questions', 'questions'));
    }


    // 大問追加
    public function bigQuestionAddIndex()
    {
        return view('admin.big_question.add');
    }
    public function bigQuestionAdd(Request $request)
    {
        BigQuestions::create([
            'name' => $request->title
        ]);
        return redirect('/admin/admin/index');
    }


    // 大問編集
    public function bigQuestionEditIndex($id)
    {
        $big_question = BigQuestions::find($id);
        return view('admin.big_question.edit', compact('big_question'));
    }
    public function bigQuestionEdit(Request $request, $big_question_id)
    {
        $big_question = BigQuestions::find($big_question_id);
        $big_question->update($request->only(['name']));
        return redirect('/admin/admin/index');
    }

    // 大問削除
    public function bigQuestionDeleteIndex($id)
    {
        $big_question = BigQuestions::find($id);
        return view('admin.big_question.delete', compact('big_question'));
    }
    public function bigQuestionDelete(Request $request, $big_question_id)
    {
        $big_question = BigQuestions::find($big_question_id);
        $questions = $big_question->questions;
        foreach ($questions as $question) {
            $choices = $question->choices;
            foreach ($choices as $choice) {
                $choice->delete();
            }
            $question->delete();
        }
        $big_question->delete();
        return redirect('admin/admin/index');
    }


    public function questionIndex($id)
    {
        $big_question = BigQuestions::find($id);
        return view('admin.questionAdmin', compact('id', 'big_question'));
    }

    // 小問削除
    public function questionDeleteIndex($id)
    {
        $question = Questions::find($id);
        return view('admin.question.delete', compact('question'));
    }
    public function questionDelete(Request $request, $id)
    {
        $question = Questions::find($id);
        $big_question_id = $question->big_question_id;
        $question->delete();
        return redirect()->route('admin.questionAdmin',['big_question_id'=>$big_question_id]);
    }

    // 小問追加
    public function questionAddIndex($id)
    {
        $big_question = BigQuestions::find($id);
        return view('admin.question.add' , compact('big_question'));
    }
    public function questionAdd(Request $request,$id)
    {
        $file = $request->file;
        $fileName = $request->{'name'.$request->valid}.'.png' ;
        $path = public_path('image/');
        $file->move($path, $fileName);

        $question = new Questions;
        $question->big_question_id = $id;
        $question->image = $fileName;
        $question->save();
        $big_question_id = $question->big_question_id;
        return redirect()->route('admin.questionAdmin',['big_question_id'=>$big_question_id]);
    }
}
