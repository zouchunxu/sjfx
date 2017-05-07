<html>
<head>
    <title>金币提现</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/assets/wechat/base.css">
    <link rel="stylesheet" href="/assets/wechat/good.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    @include('wechat.base')
    <style>
        .table {
            margin-bottom: 1px !important;
        }

        .btn-full {
            width: 100%
        }

    </style>
</head>
<body>
<div>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="100">到账银行卡</td>
            <td style="padding:0"><input name="id_card" value="{{ session('wechatDb.id_card') }}" type="number"
                                         class="form-control"/></td>
        </tr>
        {{--<tr>--}}
        {{--<td>手续费</td>--}}
        {{--<td></td>--}}
        {{--</tr>--}}
        <tr>
            <td>提现金额</td>
            <td style="padding:0"><input name="price" type="number" class="form-control"/></td>
        </tr>
        </tbody>
    </table>
    <button class="btn btn-success btn-flat btn-full" id="apply">申请提现</button>
</div>
</body>
@include('wechat.bottom-nav')
<script>
    $("#apply").click(function () {
        var param = $(".form-control").serialize();
        $.post('/user/cash', param, function (data) {
            layer.msg(data.msg);
        });
    })
</script>
</html>
