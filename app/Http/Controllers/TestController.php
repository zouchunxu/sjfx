<?php

namespace App\Http\Controllers;

use App\Common\Pay\Pay2;
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
            'notify_url' => 'http://www.taltic.com/test/demo',
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

    public function anyTest2(Request $request)
    {
        $pay = new Pay2();


        return view('test.test')->with($pay->qrcode([
            'notify_url' => 'http://www.taltic.com/test/demo',
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


    public function anyDemo(Request $request)
    {
        $data = $request->input();

        file_put_contents('/test.log',json_encode($data).'a');
        $merchant_code	= $data["merchant_code"];

        $interface_version = $data["interface_version"];

        $sign_type = $data["sign_type"];

        $dinpaySign = base64_decode($data["sign"]);

        $notify_type = $data["notify_type"];

        $notify_id = $data["notify_id"];

        $order_no = $data["order_no"];

        $order_time = $data["order_time"];

        $order_amount = $data["order_amount"];

        $trade_status = $data["trade_status"];

        $trade_time = $data["trade_time"];

        $trade_no = $data["trade_no"];

        $bank_seq_no = $data["bank_seq_no"];

        $extra_return_param = $data["extra_return_param"];


/////////////////////////////   参数组装  /////////////////////////////////
        /**
        除了sign_type dinpaySign参数，其他非空参数都要参与组装，组装顺序是按照a~z的顺序，下划线"_"优先于字母
         */


        $signStr = "";

        if($bank_seq_no != ""){
            $signStr = $signStr."bank_seq_no=".$bank_seq_no."&";
        }

        if($extra_return_param != ""){
            $signStr = $signStr."extra_return_param=".$extra_return_param."&";
        }

        $signStr = $signStr."interface_version=".$interface_version."&";

        $signStr = $signStr."merchant_code=".$merchant_code."&";

        $signStr = $signStr."notify_id=".$notify_id."&";

        $signStr = $signStr."notify_type=".$notify_type."&";

        $signStr = $signStr."order_amount=".$order_amount."&";

        $signStr = $signStr."order_no=".$order_no."&";

        $signStr = $signStr."order_time=".$order_time."&";

        $signStr = $signStr."trade_no=".$trade_no."&";

        $signStr = $signStr."trade_status=".$trade_status."&";

        $signStr = $signStr."trade_time=".$trade_time;

        //echo $signStr;

/////////////////////////////   RSA-S验证  /////////////////////////////////

        $dinpay_public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnC6g3zYYoxFqRl/GseRLmN/8XLNwk+yvXUU4Ft0GCM3pL7pQ49VW4E5Z7aqZial1hGCGokQ6UVs1AL0mc4H1f0SfGuLVxlPPVnQDuWjv2BRDUy/7BxQuZ3LN4pxn6YgEqr/DPELmSKCuffeoBab9dJjrDH002fnPfuv5J1fdNrQIDAQAB 
-----END PUBLIC KEY-----';
        $dinpay_public_key = openssl_get_publickey($dinpay_public_key);

        $flag = openssl_verify($signStr,$dinpaySign,$dinpay_public_key,OPENSSL_ALGO_MD5);


///////////////////////////   响应“SUCCESS” /////////////////////////////


        if($flag){

            echo"SUCCESS";

        }else{

            echo"Verification Error";
        }
    }

}