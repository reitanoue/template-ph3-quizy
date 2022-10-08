<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>小問管理画面</title>
</head>

<body>
    <ul>
        @foreach  ($big_question->questions as $question)
            <li>
                <div><a href="/admin/question/delete/{{ $question->id }}">小問削除</a></div>
                <div><a href="/admin/question/edit/{{ $big_question->id }}">小問編集</a></div>
                <a>
                    <img src="{{ asset('image/' . $question->image) }}" width="200">
                </a>
            </li>
        @endforeach
    </ul>
    <div><a href="/admin/question/add/{{ $big_question->id }}">小問追加</a></div>
</body>

</html>
