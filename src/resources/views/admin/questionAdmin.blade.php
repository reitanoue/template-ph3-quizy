<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>小問管理画面</title>
</head>

<body>
    <div>
        @foreach  ($big_question->questions as $question)
            <a>
                <img src="{{ asset('storage/image/' . $question->image) }}" width="200">
            </a>
        @endforeach
    </div>
</body>

</html>
