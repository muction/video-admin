<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>"video-admin" ,'middleware'=>['web'] , 'namespace'=> "Video\Admin\Controller" ], function(){

    Route::group( ['prefix'=>'auth'  , 'namespace'=> "Auth" ] , function(){

        Route::get('/login', 'AuthController@login')->name( 'video.admin.login.index' );
        Route::post('/login', 'AuthController@loginHandle')->name( 'rotate.auth.login.handle' );
        Route::get('/logout', 'AuthController@logout')->name( 'rotate.auth.logout' );

    } );


    Route::group( ['middleware'=>'video.admin.auth'] , function(){

        //后台首页
        Route::get('/' , 'RotateController@index') ->name( 'rotate.home.index' );

        //控制面板
        Route::get('/dashboard' , 'DashboardController@dashboard')->name( 'rotate.dashboard.index' );
    } );

});
