<!-- 以post方式提交所有接口参数到多的宝支付网关https://pay.ddbill.com/gateway?input_charset=UTF-8 -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body onLoad="document.dinpayForm.submit();">
<form name="dinpayForm" method="post" action="https://pay.ddbill.com/gateway?input_charset=UTF-8" target="_blank">
    <input type="hidden" name="sign"		  value="{{ $sign ?:''}}>" />
    <input type="hidden" name="merchant_code" value="{{ $merchant_code?:''}}" />
    <input type="hidden" name="bank_code"     value="{{ $bank_code?:''}}"/>
    <input type="hidden" name="order_no"      value="{{ $order_no?:''}}"/>
    <input type="hidden" name="order_amount"  value="{{ $order_amount?:''}}"/>
    <input type="hidden" name="service_type"  value="{{ $service_type?:''}}"/>
    <input type="hidden" name="input_charset" value="{{ $input_charset?:''}}"/>
    <input type="hidden" name="notify_url"    value="{{ $notify_url?:''}}">
    <input type="hidden" name="interface_version" value="{{ $interface_version?:''}}"/>
    <input type="hidden" name="sign_type"     value="{{ $sign_type?:''}}"/>
    <input type="hidden" name="order_time"    value="{{ $order_time?:''}}"/>
    <input type="hidden" name="product_name"  value="{{ $product_name?:''}}"/>
    <input Type="hidden" Name="client_ip"     value="{{ $client_ip?:''}}"/>
    <input Type="hidden" Name="extend_param"  value="{{ $extend_param?:''}}"/>
    <input Type="hidden" Name="extra_return_param" value="{{ $extra_return_param?:''}}"/>
    <input Type="hidden" Name="pay_type"  value="{{ $pay_type?:''}}"/>
    <input Type="hidden" Name="product_code"  value="{{ $product_code?:''}}"/>
    <input Type="hidden" Name="product_desc"  value="{{ $product_desc?:''}}"/>
    <input Type="hidden" Name="product_num"   value="{{ $product_num?:''}}"/>
    <input Type="hidden" Name="return_url"    value="{{ $return_url?:''}}"/>
    <input Type="hidden" Name="show_url"      value="{{ $show_url?:''}}"/>
    <input Type="hidden" Name="redo_flag"     value="{{ $redo_flag?:''}}"/>
</form>
</body>
</html>