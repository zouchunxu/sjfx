<!-- 以post方式提交所有接口参数到多的宝支付网关https://pay.ddbill.com/gateway?input_charset=UTF-8 -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body onLoad="document.dinpayForm.submit();">
<form name="dinpayForm" method="post" action="https://pay.ddbill.com/gateway?input_charset=UTF-8" target="_blank">
    <input type="hidden" name="sign" value="{{ isset($sign)?$sign:''   }}>"/>
    <input type="hidden" name="merchant_code" value="{{ isset($merchant_code)?$merchant_code:''  }}"/>
    <input type="hidden" name="order_no" value="{{ isset($order_no)?$order_no:''  }}"/>
    <input type="hidden" name="bank_code" value="{{ isset($bank_code)?$bank_code:''  }}"/>
    <input type="hidden" name="order_amount" value="{{ isset($order_amount)?$order_amount:''  }}"/>
    <input type="hidden" name="service_type" value="{{ isset($service_type)?$service_type:''  }}"/>
    <input type="hidden" name="input_charset" value="{{ isset($input_charset)?$input_charset:''  }}"/>
    <input type="hidden" name="notify_url" value="{{ isset($notify_url)?$notify_url:''  }}">
    <input type="hidden" name="interface_version" value="{{ isset($interface_version)?$interface_version:''  }}"/>
    <input type="hidden" name="sign_type" value="{{ isset($sign_type)?$sign_type:''  }}"/>
    <input type="hidden" name="order_time" value="{{ isset($order_time)?$order_time:''  }}"/>
    <input type="hidden" name="product_name" value="{{ isset($product_name)? $product_name : '' }}"/>
    <input Type="hidden" Name="client_ip" value="{{ isset($client_ip)?$client_ip:''  }}"/>
    <input Type="hidden" Name="extend_param" value="{{ isset($extend_param)?$extend_param:''  }}"/>
    <input Type="hidden" Name="extra_return_param" value="{{ isset($extra_return_param)?$extra_return_param:''  }}"/>
    <input Type="hidden" Name="pay_type" value="{{ isset($pay_type)?$pay_type:''  }}"/>
    <input Type="hidden" Name="product_code" value="{{ isset($product_code)?$product_code:''  }}"/>
    <input Type="hidden" Name="product_desc" value="{{ isset($product_desc)?$product_desc:''  }}"/>
    <input Type="hidden" Name="product_num" value="{{ isset($product_num)?$product_num:''  }}"/>
    <input Type="hidden" Name="return_url" value="{{ isset($return_url)?$return_url:''  }}"/>
    <input Type="hidden" Name="show_url" value="{{ isset($show_url)?$show_url:''  }}"/>
    <input Type="hidden" Name="redo_flag" value="{{ isset($redo_flag)?$redo_flag:''  }}"/>
</form>
</body>
</html>