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
}
