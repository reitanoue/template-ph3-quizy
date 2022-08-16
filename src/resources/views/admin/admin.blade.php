<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理画面</title>
</head>
<body>

    <ul>
        @foreach($big_questions as $big_question)
        <li>{{ $big_question->name }}
            <div>
                <a href="/admin/big_question/delete/{{ $big_question->id }}">大問削除</a>
                <a href="/admin/big_question/edit/{{ $big_question->id }}">大問変更</a>
            </div>
        </li>
        @endforeach
    </ul>
    <div><a href="/admin/big_question/add">大問追加</a></div>
</body>
</html>