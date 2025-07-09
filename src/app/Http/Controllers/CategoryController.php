<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    // view'category'を表示しつつ、テーブルからデータ持ってきて表示できるようにする
    public function index(){
        $categories = Category::all();
        return view('category',compact('categories'));
    }

    public function store(CategoryRequest $request){
        // アローの前後はスペースは入れない。
        // =の前後はスペース入れることが多い
        $category = $request->only(['name']);
        Category::create($category);

        return redirect('/categories')->with('message','カテゴリを作成しました');

    }

    public function update(CategoryRequest $request){
        $category = $request->only(['name']);
        Category::find($request->id)->update($category);

        return redirect('/categories')->with('message','カテゴリを更新しました');
    }

    public function destroy(Request $request){
        // $category=$request->only(['name']);
        // ノリで書いたけど、何も送ってないからいらないね
        // Category::find($request->id)->delete($category);
        // こっちもノリで書いたけど、deleteで指定する変数はないから空欄でいい
        Category::find($request->id)->delete();

        return redirect('/categories')->with('message','カテゴリを削除しました');
    }
}
