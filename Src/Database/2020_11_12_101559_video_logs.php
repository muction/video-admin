<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VideoLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_logs', function (Blueprint $table){
            $table->increments('id');
            $table->tinyInteger('type',false, true)->default(1)->comment('类别：1系统默认');
            $table->integer('data_id', false, true)->comment('管理数据ID');
            $table->string('title',100)->comment('日志标题');
            $table->string('content', 300)->comment('日志内容');
            $table->tinyInteger('status', false, true)->default(1)->comment('状态');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
