<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_logs', function (Blueprint $table) {
            $table->bigIncrements('id'); // 主キー
            $table->unsignedBigInteger('user_id'); // 外部キー
            $table->date('date'); // 日付
            $table->decimal('weight', 4, 1); // 体重
            $table->integer('calories')->nullable(); // 食事量（NULL許可）
            $table->integer('exercise_time')->nullable(); // 運動時間（NULL許可）
            $table->text('exercise_content')->nullable(); // 運動内容（NULL許可）
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weight_logs');
    }
}
