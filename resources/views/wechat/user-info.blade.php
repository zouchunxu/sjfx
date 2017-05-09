<html>
<head>
    <title>用户信息</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/assets/wechat/good.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    @include('wechat.base')
    <style>
        .table {margin-bottom: 5px!important}
        .col-xs-6 {padding: 1px!important;}
        .col-xs-6 button {width: 100%}
    </style>
</head>
<body>
    <div class="no-padding">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="90">真实姓名</td>
                <td style="padding:0"><input name="actual_name" type="text" value="{{ session('wechatDb.actual_name') }}" class="form-control"/></td>
            </tr>
            {{--<tr>--}}
                {{--<td width="90">身份证号</td>--}}
                {{--<td style="padding:0"><input name="id_card" type="number" class="form-control"/></td>--}}
            {{--</tr>--}}
            <tr>
                <td width="90">银行卡号</td>
                <td style="padding:0"><input name="id_card" value="{{ session('wechatDb.id_card') }}" type="number" class="form-control"/></td>
            </tr>
            <tr>
                <td width="90">联系方式</td>
                <td style="padding:0"><input name="phone" value="{{ session('wechatDb.phone') }}" type="number" class="form-control"/></td>
            </tr>
            <tr>
                <td width="90">详细地址</td>
                <td style="padding:0"><input name="full_address" value="{{ session('wechatDb.full_address') }}" type="text" class="form-control"/></td>
            </tr>
            </tbody>
        </table>
        <div>
            <div class="col-xs-6">
                <button class="btn btn-primary btn-flat" id="save">保存</button>
            </div>
            <div class="col-xs-6">
                <button class="btn btn-success btn-flat" type="reset">重置</button>
            </div>
        </div>
    </div>
</body>
@include('wechat.bottom-nav')
<script>
    $("#save").click(function(){
       var param = $(".form-control").serialize();
        $.post("/user/update",param,function(){
           layer.msg("修改成功！");
        });
    });
</script>
</html>
