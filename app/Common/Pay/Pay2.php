<?php
namespace App\Common\Pay;

class Pay2
{
    protected $merchant_public_key = <<<EOF
-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC38O28iFoJEk97uYvkbBiGU3cc
BljwNKw1wQPJ5MA8wiu+FPscYBzwL2OHiuy9PgUMnTPsSy/6IXGU1a9ibSzip71c
wcV/dMV/7DSHZPShCmVaMi1uaDSjYruFV5I4C9ytg7GmdckI1cJq/bHXYDQ6c8u2
+maSv4gnNYMAjS4H9QIDAQAB
-----END PUBLIC KEY-----
EOF;

    protected $merchant_private_key = '-----BEGIN PRIVATE KEY-----
MIICdQIBADANBgkqhkiG9w0BAQEFAASCAl8wggJbAgEAAoGBALfw7byIWgkST3u5
i+RsGIZTdxwGWPA0rDXBA8nkwDzCK74U+xxgHPAvY4eK7L0+BQydM+xLL/ohcZTV
r2JtLOKnvVzBxX90xX/sNIdk9KEKZVoyLW5oNKNiu4VXkjgL3K2DsaZ1yQjVwmr9
sddgNDpzy7b6ZpK/iCc1gwCNLgf1AgMBAAECgYAfcuTiuBlUtbm7OKUPX9/tj3Ws
5/Tq1Magxihkq2SmvrgF3sZ0OoaYFjIZKYqCbIkmd/Y5rz07sd4eiU5cMLhcmeGX
1fOXHIPgOQ+EtMAxbH2x2mhw+51OsLBx1UU80S/3Ziqgwup3iMhubAmGAiEIyVjD
amhUoTmGX7jblQGNYQJBAOcdZBermGKch4dzXGw9vZ8aM0iXfXVDoG2ohS3cOWNM
pPHLzi50StUuR7YRDjyRzmPDcKhbYTarzUfdSTu7ga0CQQDLvzWnQihRxCcYG+X9
j219i6n1zVYLoeK4aZn5ndIY4hYXntC6ClHFRM78mZZ+1qb0DhsooMWGQK5u+oRZ
iDhpAkA7Smn8PJRqb/fBAxJp3mkAISuY6uxPohrNJxeLjVzXobkLIxrxBfqQuD/D
cJqzZUCKjYAgYNkOuoJ+dkGsZk09AkB36N6Aw1TLWm/PpouiwMilfI7YVLJxQiMW
eT/fQlylvFlYKWWaN/yL5sUSsKl7mITFWY/uR0A4lNSUB+fgcWURAkBUxq61V5RX
UTCYYsU9VI9rmrdHvanF1xBP7Or5o8fXIRpFF4dWHxKnHur22de4UyQLNTNiMNyp
wixULRP9ALeA
-----END PRIVATE KEY-----';


    protected $merchant_code = '2020000568';



    public function qrcode($data)
    {
        $merchant_code = $this->merchant_code;//商户号，1111110166是测试商户号，调试时要更换商家自己的商户号

        $service_type = 'direct_pay';//微信：weixin_scan 支付宝：alipay_scan

        $notify_url = $data["notify_url"];

        $interface_version = $data["interface_version"];

        $client_ip = $data["client_ip"];

        $sign_type = $data["sign_type"];

        $order_no = $data["order_no"];

        $order_time = $data["order_time"];
        $input_charset = "UTF-8";
        $order_amount = $data["order_amount"];

        $product_name = $data["product_name"];

        $product_code = array_get($data,"product_code");

        $product_num = array_get($data,"product_num");

        $product_desc = array_get($data,"product_desc");

        $extra_return_param = array_get($data,"extra_return_param");

        $extend_param = array_get($data,"extend_param")?:'';

        $signStr= "";


        if($client_ip != ""){
            $signStr = $signStr."client_ip=".$client_ip."&";
        }
        if($extend_param != ""){
            $signStr = $signStr."extend_param=".$extend_param."&";
        }
        if($extra_return_param != ""){
            $signStr = $signStr."extra_return_param=".$extra_return_param."&";
        }

        $signStr = $signStr."input_charset=".$input_charset."&";
        $signStr = $signStr."interface_version=".$interface_version."&";
        $signStr = $signStr."merchant_code=".$merchant_code."&";
        $signStr = $signStr."notify_url=".$notify_url."&";
        $signStr = $signStr."order_amount=".$order_amount."&";
        $signStr = $signStr."order_no=".$order_no."&";
        $signStr = $signStr."order_time=".$order_time."&";


        if($product_code != ""){
            $signStr = $signStr."product_code=".$product_code."&";
        }
        if($product_desc != ""){
            $signStr = $signStr."product_desc=".$product_desc."&";
        }

        $signStr = $signStr."product_name=".$product_name."&";

        if($product_num != ""){
            $signStr = $signStr."product_num=".$product_num."&";
        }
        $merchant_private_key= openssl_get_privatekey($this->merchant_private_key);

        openssl_sign($signStr,$sign_info,$merchant_private_key,OPENSSL_ALGO_MD5);

        $sign = base64_encode($sign_info);

        $postdata = [
            'extend_param' => $extend_param,
            'extra_return_param' => $extra_return_param,
            'product_code' => $product_code,
            'product_desc' => $product_desc,
            'product_num' => $product_num,
            'merchant_code' => $merchant_code,
            'service_type' => $service_type,
            'notify_url' => $notify_url,
            'interface_version' => $interface_version,
            'sign_type' => $sign_type,
            'order_no' => $order_no,
            'client_ip' => $client_ip,
            'order_time' => $order_time,
            'order_amount' => $order_amount,
            'product_name' => $product_name,
            'input_charset' => $input_charset,
            'sign' =>$sign
        ];


        return $postdata;
    }

    public function curl($postdata)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://pay.ddbill.com/gateway?input_charset=UTF-8");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postdata));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        //$res=simplexml_load_string($response);
        curl_close($ch);
        return $response;
    }


}