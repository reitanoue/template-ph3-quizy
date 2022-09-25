<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/quizy.css">
    <link rel="stylesheet" href="/css/reset.css">

    <title>POSSE 課題 Quizy</title>
</head>

<body>


    <section class="container content-wrapper">
        <h1 class="quiz-title box-container">{{ $big_question->name }}</h1>
        <div id="quiz-box"></div>
    </section>


<section class="container content-wrapper">
    @foreach ($big_question->questions as $question)
    <div>
        <h2> {{ $loop->iteration }}.この地名はなんて読む？</h2>
        <div class="quiz-image-container">
            <img class="quiz-image" src="{{ asset('storage/image/' . $question->image) }}" alt="問題の写真">
        </div>
        <div class="choice-boxes">
            <ul id="ul-{{ $loop->iteration }}" class="choice-boxes">
                @foreach ($question->choices as $choice)
                <li id="{{ $question->id }}_{{ $loop->iteration }}_{{ $choice->valid }}" onclick="buttonClick('{{ $question->id }}','{{ $question->id }}_{{ $loop->iteration }}_{{ $choice->valid }}','{{ $question->id }}_{{ $loop->iteration }}_1')" class="choice-box">{{ $choice->name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="quiz-result" id="ans-t-{{ $loop->iteration }}">
            <p class="quiz-result-title quiz-result-title-succeeded">正解！</p>
            <p class ="quiz-result-explanation">正解は「{{ $question->choices->where('valid', '=', 1)->first()->name }}」です！</p>
        </div>
        <div class="quiz-result" id="ans-f-{{ $loop->iteration }}">
            <p class="quiz-result-title quiz-result-title-failed">不正解！</p>
            <p class ="quiz-result-explanation">正解は「{{ $question->choices->where('valid', '=', 1)->first()->name }}」です！</p>
        </div>
    </div>
        @endforeach
    </section>
    <script src="/js/quizy.js"></script>
</body>

</html>

