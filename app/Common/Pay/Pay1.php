<?php
namespace App\Common\Pay;

class Pay1
{
    protected $merchant_public_key = <<<EOF
-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnC6g3zYYoxFqRl/GseRLmN/8XLNwk+yvXUU4Ft0GCM3pL7pQ49VW4E5Z7aqZial1hGCGokQ6UVs1AL0mc4H1f0SfGuLVxlPPVnQDuWjv2BRDUy/7BxQuZ3LN4pxn6YgEqr/DPELmSKCuffeoBab9dJjrDH002fnPfuv5J1fdNrQIDAQAB 
-----END PUBLIC KEY-----
EOF;

    protected $merchant_private_key = '-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQC0cAsAhnfHdHdCbLd7VNgMlZiezMLq6MryR6Bn41v0HTTQpv6V
Gn3+vjymwtBqgK4tJumIKsFzKJwmSjKSv8T6gbncOc/xap1nT2TAAoSn+xzGMuj9
PyVQQs2WrqIjVgzrofbmGdCZXosqFdy/4HbTHtaX0YhryvM44DTmqTRQJQIDAQAB
AoGARVIOSANhHRWXg8N0skMkRaFrYwbTk6Af5/iwnXjxqNVXpxmhEPN+mFHJx19s
5p3NTLd4XMHgVDez1doHl+1o5Rcwzo2boYh9h0qo0L5P6mEJin14JQrBRnejwzY6
7DW+o/d5OFv4KQJd1E5uo345sIkAdFWdKMteIkQDWpjinXkCQQDoXYUvYL02V0Xi
S2njJfAo7LiJj2bhe7+DiS4vP8UVt3SPlURyuhQMUnHY8eTDe4kneaeTLIpWy1WJ
T8hMAjbTAkEAxsplk4Me7q0R08ACiIl52Zctk9ljlGbK4E9CL6YE2dXyKOFhA+m2
XUaAB118fBPOMvnPoA3ugOq5NBCMZTxyJwJAErBK4Pef4Dn+teeo2YsYmMIJSY8O
ED6ataKX41b2q/t4VYAE5FFRAXi0DWXPJ2XNLy6aqryfV8G83HFdQ7e93wJAS9QS
sRU4LGUaQsKgdMK0FzsiqJ4o7QfU5YF2RsS2Xv3MVKm8Hwj8hlIJLkYL4SyQ4EMI
Xw5RZx2iLekOFOPcywJBAMWJ0y9uYj6CB5dWbmH0+1ylgMVLRI+SQh7pBVDNFGHM
EfMhAho2He0wH3ctVY1FruRD9QMpJlEBtF4EBNVhpJA=
-----END RSA PRIVATE KEY-----';


    protected $merchant_code = '2020000568';



    public function qrcode($data)
    {
        $merchant_code = $this->merchant_code;//商户号，1111110166是测试商户号，调试时要更换商家自己的商户号
        $merchant_code = '1111110166';//商户号，1111110166是测试商户号，调试时要更换商家自己的商户号

        $service_type = 'weixin_scan';//微信：weixin_scan 支付宝：alipay_scan

        $notify_url = $data["notify_url"];

        $interface_version = $data["interface_version"];

        $client_ip = $data["client_ip"];

        $sign_type = $data["sign_type"];

        $order_no = $data["order_no"];

        $order_time = $data["order_time"];

        $order_amount = $data["order_amount"];

        $product_name = $data["product_name"];

        $product_code = array_get($data,"product_code");

        $product_num = array_get($data,"product_num");

        $product_desc = array_get($data,"product_desc");

        $extra_return_param = array_get($data,"extra_return_param");

        $extend_param = array_get($data,"extend_param")?:'';

        $signStr = "";

        $signStr = $signStr . "client_ip=" . $client_ip . "&";

        if ($extend_param != "") {
            $signStr = $signStr . "extend_param=" . $extend_param . "&";
        }

        if ($extra_return_param != "") {
            $signStr = $signStr . "extra_return_param=" . $extra_return_param . "&";
        }

        $signStr = $signStr . "interface_version=" . $interface_version . "&";

        $signStr = $signStr . "merchant_code=" . $merchant_code . "&";

        $signStr = $signStr . "notify_url=" . $notify_url . "&";

        $signStr = $signStr . "order_amount=" . $order_amount . "&";

        $signStr = $signStr . "order_no=" . $order_no . "&";

        $signStr = $signStr . "order_time=" . $order_time . "&";

        if ($product_code != "") {
            $signStr = $signStr . "product_code=" . $product_code . "&";
        }

        if ($product_desc != "") {
            $signStr = $signStr . "product_desc=" . $product_desc . "&";
        }

        $signStr = $signStr . "product_name=" . $product_name . "&";

        if ($product_num != "") {
            $signStr = $signStr . "product_num=" . $product_num . "&";
        }

        $signStr = $signStr . "service_type=" . $service_type;

        $this->merchant_private_key='-----BEGIN PRIVATE KEY-----
MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBALf/+xHa1fDTCsLY
PJLHy80aWq3djuV1T34sEsjp7UpLmV9zmOVMYXsoFNKQIcEzei4QdaqnVknzmIl7
n1oXmAgHaSUF3qHjCttscDZcTWyrbXKSNr8arHv8hGJrfNB/Ea/+oSTIY7H5cAtW
g6VmoPCHvqjafW8/UP60PdqYewrtAgMBAAECgYEAofXhsyK0RKoPg9jA4NabLuuu
u/IU8ScklMQIuO8oHsiStXFUOSnVeImcYofaHmzIdDmqyU9IZgnUz9eQOcYg3Bot
UdUPcGgoqAqDVtmftqjmldP6F6urFpXBazqBrrfJVIgLyNw4PGK6/EmdQxBEtqqg
XppRv/ZVZzZPkwObEuECQQDenAam9eAuJYveHtAthkusutsVG5E3gJiXhRhoAqiS
QC9mXLTgaWV7zJyA5zYPMvh6IviX/7H+Bqp14lT9wctFAkEA05ljSYShWTCFThtJ
xJ2d8zq6xCjBgETAdhiH85O/VrdKpwITV/6psByUKp42IdqMJwOaBgnnct8iDK/T
AJLniQJABdo+RodyVGRCUB2pRXkhZjInbl+iKr5jxKAIKzveqLGtTViknL3IoD+Z
4b2yayXg6H0g4gYj7NTKCH1h1KYSrQJBALbgbcg/YbeU0NF1kibk1ns9+ebJFpvG
T9SBVRZ2TjsjBNkcWR2HEp8LxB6lSEGwActCOJ8Zdjh4kpQGbcWkMYkCQAXBTFiy
yImO+sfCccVuDSsWS+9jrc5KadHGIvhfoRjIj2VuUKzJ+mXbmXuXnOYmsAefjnMC
I6gGtaqkzl527tw=
-----END PRIVATE KEY-----';
        $merchant_private_key = openssl_get_privatekey($this->merchant_private_key);

        openssl_sign($signStr, $sign_info, $merchant_private_key, OPENSSL_ALGO_MD5);

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
            'sign' =>$sign,
        ];


        return $this->curl($postdata);
    }

    public function curl($postdata)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.ddbill.com/gateway/api/scanpay");
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