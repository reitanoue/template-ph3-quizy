<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>管理画面　小問</title>
    <link href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
</head>

<body>
    {{ $big_question->name }}
    <form action="/{{ request()->path() }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="submit" value="削除">
    </form>
</body>

</html>