@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
@if(session('message'))
<div class="todo__alert">
    <div class="todo__alert--success">
        {{ session('message') }}
    </div>
</div>
@endif
{{-- <div class="todo__alert">
    <div class="todo__alert--success">
        Todoを作成しました
    </div>
</div> --}}

{{-- バリデーション。タスク登録失敗したよ --}}
@error('content')
<div class="todo__alert--danger">
    <ul>
        <li>{{ $message }}</li>
    </ul>
</div>
@enderror

{{-- エラーがforeachで複数出るようにできる。上は個別の時とかにいいかも --}}
{{-- 教材はこっち。でもめんどくね？ --}}
{{-- ifなくても必要時しか表示されなかったけど、可読性を考えてつける --}}
{{--@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="todo__alert--danger">
    <ul>
        <li>{{$error}}</li>
    </ul>
</div>
@endforeach
@endif--}}

{{--タスク追加--}}
<div class="todo__content">
    <div class="todo__title">
        <h2>
            新規作成
        </h2>
    </div>
    <form class="create-form" action="/todos" method="post">
        @csrf
        <div class="create-form__item">
            <input
                class="create-form__item--input"
                type="text"
                name="content"
                value="{{ old('content') }}"
            />
            {{-- カテゴリ名入れようと思って'name'したんだけどidだった --}}
            <select class="create-form__item--select" name="category_id">
                {{-- foreachにしないと、１つしか表示されない --}}
                @foreach ($categories as $category)
                <option value="{{$category['id']}}">{{$category['name']}}</option>
                {{-- selectの子要素optionあったね！ --}}
                {{-- セレクトボックスに表示されるのがname。送信されるのはcategory_id --}}
                {{-- 配列から持ってくるから[]で囲んでね。('')にしがち --}}
                @endforeach
            </select>
        </div>
        <div class="create-form__button">
            <button class="create-form__button--submit" type="submit">
                作成
            </button>
        </div>
    </form>

{{-- タスク検索 --}}
    <div class="todo__title">
        <h2>
            Todo検索
        </h2>
    </div>
    <form class="search-form" action="/todos/search" method="get">
        @csrf
        <div class="search-form__item">
            <input
                class="search-form__item--input"
                type="text"
                {{-- name="content" contentはタスク作成のキー--}}
                name="keyword"
                value="{{old('keyword')}}"
            />
            {{-- name="category_id"をつけ忘れたせいでCategorySearch動かなかった！ --}}
            <select class="search-form__item--select" name="category_id">
                @foreach($categories as $category)
                    {{-- {{$category['id']}}がなくてもCategorySearch動かない --}}
                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                    {{-- こっちはtodoに紐づいたカテゴリ名を表示したい訳ではないから$categoryでOK --}}
                @endforeach
            </select>
        </div>
        <div class="search-form__button">
            <button class="search-form__button--submit" type="submit">
                検索
            </button>
        </div>
    </form>

{{--タスク更新・削除 --}}
    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">
                    <span class="todo-table__header--span">
                        Todo
                    </span>
                    <span class="todo-table__header--span">
                        カテゴリ
                    </span>
                </th>
            </tr>
            @foreach($todos as $todo)
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form class="update-form" action="/todos/update" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="update-form__item">
                            <input class="update-form__item--input" type="text" name="content" value="{{$todo['content']}}" />
                            <input type="hidden" name="id" value="{{ $todo['id'] }}">
                        </div>
                        <div class="update-form__item">
                            <p class="update-form__item-p">
                                {{$todo['category']['name']}}
                                {{-- {{$category['name']}} でいいのかなと思ったんだけど…--}}
                                {{-- $todo['name']だとブランクになる --}}
                                {{-- $category['category']['name']だともちろんエラー --}}
                                {{-- Todoが主役だからこの書き方でOK！可読性 --}}
                                {{-- todoに紐づいているカテゴリ名を持ってきたいからこの書き方 --}}
                            </p>
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button--submit" type="submit">
                                更新
                            </button>
                        </div>
                    </form>
                </td>
                <td class="todo-table__item">
                    <form class="delete-form" action="todos/delete" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="delete-form__button">
                            <input type="hidden" name="id" value="{{ $todo['id'] }}">
                            <button class="delete-form__button--submit" type="submit">
                                削除
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
