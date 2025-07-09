<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos',
            function (Blueprint $table) {
                $table->id();
                // 外部キーを追加
                $table->foreignId('category_id')->constrained()->cascadeOnDelete();
                $table->string('content',20);
                $table->timestamp('created_at');
                $table->timestamp('updated_at');
        });
    }
    //$table->created_at();って書いてエラー出したバカはここwww

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
