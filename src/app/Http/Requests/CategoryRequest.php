<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * バリデーション〜。制約
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required|string|max:10|unique:categories'
        ];
        // 重複のところ、userだったらusersだよ
        // 間違えてrequireと打ってエラー出た
    }

    /**
     * バリデーションメッセージ〜
     *
     * @return void
     */
    public function messages()
    {
        return [
            'name.required'=>'必須だよ',
            'name.string'=>'文字列でおね',
            'name.max'=>'10文字以下でおね',
            'name.unique'=>'すでに登録済みだよ'
        ];
    }
}
