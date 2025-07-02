<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todoアプリ</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

{{-- ①ここから --}}
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

{{-- ①ここまで --}}

</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                Todo
            </a>
        </div>
    </header>
    <main>

{{-- ②ここから --}}
        {{-- タスク追加時に上部に出るメッセージ --}}
        @yield('content')
        <div class="massage">
            <div class="massage__inner--success">
                Todoを作成しました
            </div>
        </div>

        {{--タスク追加--}}
        <div class="todo__content">
            <form class="create-form” action="" method="">
                @csrf
                <div class="create-form__item">
                    <input class="create-form__item--input" type="text" name=""/>
                </div>
                <div class="create-form__button">
                    <button class="create-form__button--submit" type="submit">
                        作成
                    </button>
                </div>
            </form>

        {{--タスク修正・追加 --}}
        <div class="todo-table">
            <table class="todo-table__inner">
                <tr class="todo-table__row">
                    <th class="todo-table__header">
                        Todo
                    </th>
                </tr>
                <tr class="todo-table__row">
                    <td class="todo-table__item">
                        <form class="update-form" action="" method="">
                            @csrf
                            <div class="update-form__item">
                                <input class="update-form__item--input" type="text" name=""><input/>
                            </div>
                            <div class="update-form__button">
                                <button class="update-form__button--submit" type="submit">
                                    更新
                                </button>
                            </div>
                        </form>
                    </td>
                    <td class="todo-table__item">
                        <form class="delete-form" action="" method="">
                            @csrf
                            <div class="delete-form__button">
                                <button class="delete-form__button--submit" type="submit">
                                    削除
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
                <tr class="todo-table__row">
                    <td class="todo-table__item">
                        <form class="update-form">
                            @csrf
                            <div class="update-form__item">
                                <input class="update-form__item--input" type="text" name="" />
                            </div>
                            <div class="update-form__button">
                                <button class="update-form__button--submit" type="submit">
                                    更新
                                </button>
                            </div>
                        </form>
                    </td>
                    <td class="todo-table__item">
                        <form class="delete-form" action="" method="">
                            @csrf
                            <div class="delete-form__button">
                                <button class="delete-form__button--submit" type="submit">
                                    削除
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
{{-- ②ここまで --}}

    </main>
</body>
</html>
