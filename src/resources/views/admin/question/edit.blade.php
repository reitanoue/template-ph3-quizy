<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>管理画面　小問編集</title>
    <link href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
</head>

<body>
    <h2>小問編集</h2>
    <form action="/{{ request()->path() }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom: 20px">
            {{-- <h3 style="margin-bottom: 0; font-size: 16px;">問題の画像</h3>
            <input type="file" name="file"> --}}
            <h3 style="margin-bottom: 0; font-size: 16px;">問題の選択肢</h3>
        </div>
        @csrf
        <table>
            <tr>
                <th>選択肢</th>
                <th>正解</th>
            </tr>
            @foreach($question->choices as $choice)
                <tr>
                    <td>{{ $loop->index +1 }}</td>
                    <td>
                        <input
                            type="text"
                            name="name{{ $loop->index }}"
                            value="{{ $choice->name }}"
                        >
                    </td>
                    <td>
                        <input
                            type="radio"
                            name="valid"
                            value="{{ $loop->index }}"
                            @if($choice->valid) checked @endif
                        >
                    </td>
                </tr>
            @endforeach
        </table>
        <input type="submit" value="変更">
    </form>
</body>

</html>