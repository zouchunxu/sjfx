<?php

namespace App\Console\Commands;

use EasyWeChat\Foundation\Application;
use Illuminate\Console\Command;

class WechatMenu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wechat:menu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     */
    public function handle(Application $wechat)
    {
        $menu = $wechat->menu;
        $buttons = [
            [
                "type" => "view",
                "name" => "我的庄园",
                "url"  => "http://www.taltic.com/index"
            ],
        ];
        $menu->add($buttons);
    }
}
