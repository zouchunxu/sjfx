<?php

namespace App\Http\Controllers;

use App\Common\Pay\Pay1;
use App\Models\UserMapLog;
use Illuminate\Http\Request;
use Log;
use EasyWeChat\Foundation\Application;

class TestController extends Controller
{

    public function anyTest(Request $request)
    {
        $pay = new Pay1();


        var_dump($pay->qrcode([
            'notify_url' => 'taltic.com',
            'interface_version' => 'V3.1',
            'client_ip' => $request->getClientIp(),
            'sign_type' => 'RSA-S',
            'order_no' => time(),
            'order_time' => date('Y-m-d H:i:s'),
            'order_amount' => 0.1,
            'product_name' => 'test',
            'product_code' => '123',
            'product_num' => '1',
            'product_desc' => 'test',
            'extra_return_param' => 'cesh',
            'extend_param' => ''
        ]));
    }


    public function anyDemo()
    {

    }

}