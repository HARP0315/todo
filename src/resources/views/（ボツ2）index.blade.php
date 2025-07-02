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

        {{-- タスク追加時に上部に出るメッセージ --}}
        <div>
            <div>
                Todoを作成しました
            </div>
        </div>

        {{--タスク追加--}}
        <div>
            <form class="task--form" name="task" action="" method="post">
                @csrf
                <div class="task--form__input">
                    <div>
                        <input type="text" name="task" class="task--form__input--item" />
                    </div>
                    <div>
                        <button class="task--form__input--botton" type="submit">
                            作成
                        </button>
                    </div>
                </div>
            </form>
            {{-- class名は後で書く --}}

        {{-- タスク修正・削除コンテンツ、の間違いver2（正解は最下部）--}}
        {{-- こういうのもTableでいけるんだなぁ。行けそうな気はするけど…でも自信なかった --}}
        {{-- formのくくり方が違う。画面設計の読みが甘い --}}
        <div>
            <table>
                <tr>
                    <th>Todo</th>
                </tr>
                <tr>
                    <th>タスク</th>
                    {{-- 変数から取り出して表示 --}}
                    <td>
                        <form action="">
                            <div>
                                <button>更新</button>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="">
                            <div>
                                <button>更新</button>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </main>
</body>
</html>


{{-- 後半の正解 --}}
{{-- thだけ、tdだけもできるんだなぁ --}}
{{-- Tableもformもclassつけられるんだな。まぁできない理由ないか--}}

<div>
    <table>
        <tr>
            <th>Todo</th>
        </tr>
        <tr>
            <td>
                <form>
                    <div>
                        <input>
                    </div>
                    <div>
                        <button>更新</button>
                    </div>
                </form>
            </td>
            <td>
                <form>
                    <div>
                        <button>削除</button>
                    </div>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <form>
                    <div>
                        <input>
                    </div>
                    <div>
                        <button>更新</button>
                    </div>
                </form>
            </td>
            <td>
                <form>
                    <div>
                        <button>削除</button>
                    </div>
                </form>
            </td>
        </tr>
    </table>
</div>

