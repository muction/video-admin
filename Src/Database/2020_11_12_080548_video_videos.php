<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VideoVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_videos',function(Blueprint $table){
            $table->increments('id');
            $table->string('name',200)->comment('文件原名');
            $table->string('origin_save_file_path', 200)->comment('保存路径');
            $table->string('origin_save_file_name', 200)->comment('存储文件名');
            $table->string('handle_save_file_path', 200)->comment('处理完成保存路径');
            $table->string('handle_save_file_name', 200)->comment('处理完成存储文件名');
            $table->string('file_type')->comment('文件扩展名，大写');
            $table->char('file_md5', 32)->comment('文件MD5');
            $table->string('file_hash',128)->comment('文件HASH');
            $table->integer('size')->default(0)->comment('文件大小');
            $table->integer('create_user_id')->default(0)->comment('上传者ID');
            $table->dateTime('handle_time')->comment('处理时间');
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
