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
                <a>
                    <img src="{{ asset('storage/image/' . $question->image) }}" width="200">
                </a>
                <div><a href="/admin/question/delete/{{ $question->id }}">小問削除</a></div>
            </li>
        @endforeach
    </ul>
    <div><a href="/admin/question/add/{{ $big_question->id }}">小問追加</a></div>
</body>

</html>
