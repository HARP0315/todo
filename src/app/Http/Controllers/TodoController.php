<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest as RequestsTodoRequest;
use Illuminate\Http\Request;
//元からあるの消しちゃだめ。バリデーション使わないアクションで使う
use App\Http\Requests\TodoRequest;
// use Illuminate\Http\TodoRequest;自動入力だとディレクトリ構造違う時あるから注意！
use App\Models\Todo; // Todoモデルをインポート

class TodoController extends Controller
{
    /**
     * Undocumented function
     *トップページを表示
     * @return void
     */
    public function index()
    {
        // タスク登録後にindexページで登録タスクを表示できるようにする
        // Todoモデルを使って全てのタスクを取得
        $todos = Todo::all();
        // ビューを返す（追加：DBから取り出したtodoもindexで表示）
        return view('index', compact('todos'));
        // return view('index',['todo'=>$todos]);を楽に書くと
    }

    /**
     * Undocumented function
     *入力したタスクをDBに保存、リダイレクトする
     * @param TodoRequest $request
     * @return void
     */
    public function store(TodoRequest $request)
    {
        // リクエストを受け取る
        $todo=$request->all();
        Todo::create($todo);
        // Todoモデル使って入力したタスクをDBに保存する
        return redirect('/')->with('message', 'Todoを作成しました');
        // return view('index');間違えた。指示はリダイレクト！
    }

    /**
     * Undocumented function
     *データ更新してリダイレクト
     * @param TodoRequest $request
     * @return void
     */
    public function update(TodoRequest $request)
    {

        // $todo=$request->all();今回contentしかないけど、安全面考えてonlyで指定した方がいい
        $todo=$request->only('content');
        // _tokenは更新に必要ないので削除
        unset($todo['_token']);
        Todo::find($request->id)->update($todo);
        // Todoモデル使ってidの検索をし、DBを更新する
        return redirect('/')->with('message', 'Todoを更新しました');
    }

    /**
     * Undocumented function
     *データの削除してリダイレクト
     * @param TodoRequest $request
     * @return void
     */

    //TodoRequestは使わないから、RequestでOK。注意〜
    public function destroy(Request $request)
    {
        //変数の設定とかいらない。即idから検索して削除
        Todo::find($request->id)->delete();
        return redirect('/')->with('message', 'Todoを削除しました');
    }
}
