<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VideoAdmins extends Migration
{

    /*
    |--------------------------------------------------------------------------
    | 后台管理员账号表
    |--------------------------------------------------------------------------
    |
    | 系统管理员账号信息
    |
    |
    */
    public function up()
    {
        Schema::create('video_admins', function(Blueprint $table){
            $table->increments('id');
            $table->string('nickname', 100)->comment('昵称');
            $table->string('username', 100)->comment('登录名');
            $table->string('password', 128)->comment('登录密码');
            $table->string('email', 50)->comment('邮箱');
            $table->string('phone', 20)->comment('手机');
            $table->string('action', 100)->comment('可操作权限');
            $table->tinyInteger('status', false, true)->default(1)->comment('状态：1可用0不可用');
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
        // 回滚操作不支持
    }
}
