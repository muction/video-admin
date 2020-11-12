<?php

namespace Video\Admin;

use Illuminate\Support\ServiceProvider;

class VideoAdminProvider extends ServiceProvider
{
    /**
     * 当前版本号
     */
    const VERSION = 2.0;

    /**
     * 支持命令
     * @var array
     */
    protected $commands = [
        \Video\Admin\Console\Command\SyncDatabaseCommand::class
    ];

    /**
     * 路由中间件
     * @var array
     */
    protected $routeMiddleware = [
        'video.admin.auth' => Middleware\VideoAdminMiddleware::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        if($this->app->runningInConsole()){
            $this->commands( $this->commands );
        }

        $this->app->shouldSkipMiddleware();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom( __DIR__.'/Config/videoAdmin.php' , 'VideoAdmin' );
        $this->loadViewsFrom( $this->getViewPath() , 'videoAdmin' );
        $this->loadRoutesFrom( __DIR__. "/Route/route.php" );
        $this->publishes([
            __DIR__ .'/Asset/video-admin' => public_path( "static/video-admin/" )  ,
            __DIR__.'/Config/videoAdmin.php' => config_path('videoAdmin.php'),
        ], 'videoAdmin');

        //注册路由中间件
        $this->registryRouteMiddleware();

    }

    /**
     * 注册中间件
     */
    protected function registryRouteMiddleware(){

        foreach ( $this->routeMiddleware as $alias=>$class){
            app('router')->aliasMiddleware( $alias , $class);
        }
    }

    /**
     * 获取视图路径
     * @return string
     */
    private function getViewPath(){
        return __DIR__ .'/Views/';
    }
}
