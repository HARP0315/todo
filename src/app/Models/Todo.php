<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'content'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    // オブジェクトだけど配列ではない？？？？
    // モデルを使って取ってきたインスタンス（＝オブジェクト（
    /**
     * カテゴリサーチのscopeメソッドだよ
     *
     * @param object $query
     * @param int $category_id
     * @return void
     */
    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    /**
     * Undocumented function
     *
     * @param object $query
     * @param string $keyword
     * @return void
     */
    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('content', 'like', '%' . $keyword . '%');
        }
    }
}
