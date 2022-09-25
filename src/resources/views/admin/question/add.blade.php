<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>管理画面　小問追加</title>
    <link href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
</head>

<body>
    <h2>小問追加</h2>
    <form action="/{{ request()->path() }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom: 20px">
            <h3 style="margin-bottom: 0; font-size: 16px;">問題の画像</h3>
            <input type="file" name="file">
            <h3 style="margin-bottom: 0; font-size: 16px;">問題の選択肢</h3>
            <label for="quizChoice1">
                <input type="text" name="choice" value= '1' id='quizChoice1'>

            </label>
            <label for="quizChoice2">
                <input type="text" name="choice" value= '0' id="quizChoice2">
            </label>
            <label for="quizChoice3">
                <input type="text" name="choice" value= '0' id="quizChoice3">
            </label>
        </div>
        <input type="submit" value="追加">
    </form>
</body>

</html>