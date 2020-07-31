<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


// tasksテーブル
class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
            
            // 7月31日追記
            // 整数を登録できる->新しいカラムを追加する時に便利
            $table->integer('finish_flag');
            // 色のときも数字で管理すると変更が楽になる
            $table->integer('color');
            // カテゴリ
            $table->integer('category');
            // 期限設定 　日付型
            $table->date('limit');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
