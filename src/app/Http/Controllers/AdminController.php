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
        return redirect()->route('admin.questionAdmin', ['big_question_id' => $big_question_id]);
    }

    //小問編集
    public function questionEditIndex($id)
    {

        $big_question = BigQuestions::find($id);
        $question = Questions::find($id);

        return view('admin.question.edit', compact('big_question', 'question'));
    }
    public function questionEdit(Request $request, $id)
    {
        $question = Questions::find($id);
        $choices = Questions::find($id)->choice;
        foreach ((array)$choices as $index => $choice) {
            $choice->name = $request->{'name'.$index};
            if ($index === intval($request->valid)) {
                $choice->valid = true;
            } else {
                $choice->valid = false;
            }
            $choice->save();
        }
        $big_question_id = $question->big_question_id;
        return redirect()->route('admin.questionAdmin', ['big_question_id' => $big_question_id]);
    }

    // 小問追加
    public function questionAddIndex($id)
    {
        $big_question = BigQuestions::find($id);
        return view('admin.question.add', compact('big_question'));
    }
    public function questionAdd(Request $request, $id)
    {
        $file = $request->file;
        $fileName = $request->{'name' . $request->valid} . '.png';
        $path = public_path('image/');
        $file->move($path, $fileName);

        $question = new Questions;
        $question->big_question_id = $id;
        $question->image = $fileName;
        $question->save();

        //intval($request->valid)には1,2,3のいずれかが整数として入り、それを===1,2,3で比較して同じならtrueが返される→validに1が入る
            $question->choices()->saveMany([
            new Choices([
                'name' => $request->name1,
                'valid' => intval($request->valid) === 1,
            ]),
            new Choices([
                'name' => $request->name2,
                'valid' => intval($request->valid) === 2,
            ]),
            new Choices([
                'name' => $request->name3,
                'valid' => intval($request->valid) === 3,
            ]),
        ]);
        $big_question_id = $question->big_question_id;
        return redirect()->route('admin.questionAdmin', ['big_question_id' => $big_question_id]);
    }
}
