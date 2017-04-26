<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use EasyWeChat\Foundation\Application;

class WechatController extends Controller
{

    private $wechat;

    public function __construct(Application $wechat)
    {
        $this->wechat = $wechat;
    }

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
//        $Wechat = app('Wechat');
        $this->wechat->server->setMessageHandler(function ($message) {
            return "欢迎关注 overtrue！";
        });

        Log::info('return response.');

        return $this->wechat->server->serve();
    }

    public function qrcodeImg(Request $request)
    {
        $wechat = $this->wechat;
        $qrcode = $wechat->qrcode;
        $ticket = $request->input('ticket','http://weixin.qq.com/q/02M_uXR-tKaP_100000075');
        $url = $qrcode->url($ticket);
        return $url;
    }

}