<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todoアプリ</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="../views/index.blade.php">
                Todo
            </a>
        </div>
    </header>
    <main>

        <div>
            <h2></h2>
        </div>
        {{-- 見出しじゃないから、hは使わずにdivで対応 --}}

        <div>


            <form class="task--form" name="task" action="" method="post">
                @csrf
                <div class="task--form__input">
                    <input type="text" name="task" class="task--form__input--item" />
                    <button class="task--form__input--botton" type="submit">
                        作成
                    </button>
                </div>
            </form>
            {{-- 上の構造は大体合ってるけど、textエリア、ボタンをそれぞれdivで包むべし --}}

            {{-- 下はそもそもTableなんだよね。確かに悩んだけども〜涙 --}}
            {{-- あと画面設計読み込み甘くて勘違いしてた --}}
            <div class="task--list">
                <h2 class="task--list__ttl">Todo</h2>
                <div>
                    <span class="task--list__item"></span>
                    {{-- ここで変数から取り出して表示したい。←ていうのがまず勘違い。ここはText修正です --}}
                    <div>
                        <form class="task--list__index" name="update" action="" method="get">
                            @csrf
                            <button class="botton__inner">更新</button>
                        </form>
                        <form class="task--list__index" name="delete" action="" method="get">
                            @csrf
                            <button class="botton__inner">削除</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
