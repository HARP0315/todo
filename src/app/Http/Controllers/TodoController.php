<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//元からあるの消しちゃだめ。バリデーション使わないアクションで使う
use App\Http\Requests\TodoRequest;
// use Illuminate\Http\TodoRequest;自動入力だとディレクトリ構造違う時あるから注意！
use App\Models\Todo; // Todoモデルをインポート
use App\Models\Category;

class TodoController extends Controller
{
    /**
     * トップページを表示
     *
     * @return void
     */
    public function index()
    {
        // タスク登録後にindexページで登録タスクを表示できるようにする
        // Todoモデルを使って全てのタスクを取得
        // $todos = Todo::all();
        // withメソッドで、Todoモデルで作ったリレーションのメソッドを使える
        // categoryメソッドも使って、データを持ってくるよ
        $todos = Todo::with('category')->get();
        $categories=Category::all();
        // ビューを返す（追加：DBから取り出したtodoもindexで表示）
        return view('index', compact('todos','categories'));
        // return view('index',['todo'=>$todos]);を楽に書くと
    }

    /**
     * Todoモデルで設定したsearchメソッドを使う
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        // ->の前に改行入れて読みやすくしてOK！
        $todos = Todo::with('category')
                    ->CategorySearch($request->category_id)
                    ->KeywordSearch($request->keyword)
                    ->get();
        $categories = Category::all();

        return view('index', compact('todos', 'categories'));
    }

    /**
     *入力したタスクをDBに保存、リダイレクトする
     *
     * @param TodoRequest $request
     * @return void
     */
    public function store(TodoRequest $request)
    {
        // リクエストを受け取る
        // ->only('content')の方が安全！
        // DBに直接に入れる時はonlyで絞ってあげた方がいい
        $todo=$request->only('category_id','content');
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
        // onlyにしてるからトークンは入らない
        // unset($todo['_token']);
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
