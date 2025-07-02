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

    {{-- リンクは「/」 でよかったね--}}
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="../views/index.blade.php">
                Todo
            </a>
        </div>
    </header>
    <main>

        {{-- タスク追加時に上部に出るメッセージ --}}
        <div class="message">
            <div message__inner--success>
                Todoを作成しました
            </div>
        </div>

        {{--タスク追加--}}
        <div>
            <form class="task-form" action="" method="post">
                @csrf
                <div class="task-form__input">
                    <div>
                        <input type="text" name="task" class="task-form__input--item" />
                    </div>
                    <div>
                        <button class="task-form__input--button" type="submit">
                            作成
                        </button>
                    </div>
                </div>
            </form>

        {{--タスク修正・追加 --}}
        <div class="task-list">
            <table class="task-list__table">
                <tr class="task-list__table--row">
                    <th class="task-list__table--header">
                        Todo
                    </th>
                </tr>
                <tr class="task-list__table--row">
                    <td class="task-list__table--data">
                        <form class="task-list__form" action="" method="post">
                            @csrf
                            <div class="task-list__form--input">
                                <input class="task-list__form--input__task" type="text" name="update"><input/>
                            </div>
                            <div class="task-list__form--button">
                                <button class="task-list__form--button__update">
                                    更新
                                </button>
                            </div>
                        </form>
                    </td>
                    <td class="task-list__table--data">
                        <form class="task-list__form" action="" method="get">
                            @csrf
                            <div class="task-list__form--button">
                                <button class="task-list__form--button__delete">
                                    削除
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form>
                            @csrf
                            <div>
                                <input/>
                            </div>
                            <div>
                                <button>
                                    更新
                                </button>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form>
                            @csrf
                            <div>
                                <button>
                                    削除
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </main>
</body>
</html>
