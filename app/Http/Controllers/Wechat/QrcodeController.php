<?php
namespace App\Http\Controllers\Wechat;

use EasyWeChat\Foundation\Application;
use Illuminate\Routing\Controller;

class QrcodeController extends Controller
{
    public function getMake(Application $wechat)
    {
        $qrcode = $wechat->qrcode;
        $result = $qrcode->forever('');// 或者 $qrcode->forever("foo");
        $ticket = $result->ticket; // 或者 $result['ticket']
        $url = $result->url;
        return $url;
    }
}