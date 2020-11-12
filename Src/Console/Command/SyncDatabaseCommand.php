<?php

namespace Video\Admin\Console\Command;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class SyncDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video-admin:sync-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '将VideoAdmin系统数据库迁移文件复制到包目录';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Exception
     */
    public function handle()
    {

        $targetDir = base_path('extends/video-studio/video-admin/Src/Database');
        $sourceDir = base_path('database/migrations');
        $this->warn('开始同步数据库迁移文件');
        $this->info('扫描目录:'.$targetDir );
        $files = scandir($sourceDir);
        foreach ($files as $file){
            if(strpos($file, 'video_')){
                $sourceFilePath=$sourceDir.'/'.$file;
                $targetFilePath=$targetDir.'/'.$file ;
                if(!file_exists($sourceFilePath)){
                    $this->warn('文件不存在:'. $sourceFilePath );
                    continue;
                }

                if( copy( $sourceFilePath, $targetFilePath )){
                   $this->info('复制成功:'.$file);
                }else{
                   $this->error('复制失败:'.$file);
                }
            }
        }
        $this->info('同步完成');
    }
}
