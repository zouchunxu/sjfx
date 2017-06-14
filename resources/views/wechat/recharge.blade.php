<html>
<head>
    <title>金币充值</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/assets/wechat/base.css">
    <link rel="stylesheet" href="/assets/wechat/good.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    @include('wechat.base')
    <style>
        .table {margin-bottom: 1px!important;}
        .btn-full {width: 100%}
        .btn{
            margin: 8px 0;
        }
    </style>
</head>
<body>
<div>
    <table class="table table-bordered" style="margin-bottom: 6px">
        <tbody>
        <tr>
            <td colspan="2" align="center" style="overflow: hidden">
                <img src="http://www.taltic.com/assets/img/cash.png" height="200px" alt="">
            </td>
        </tr>
        {{--<tr>--}}
        {{--<td>手续费</td>--}}
        {{--<td></td>--}}
        {{--</tr>--}}
        <tr>
            <td>充值金额</td>
            <td style="padding:0"><input name="price" id="price" type="number" class="form-control"/></td>
        </tr>
        </tbody>
    </table>
    <button class="btn btn-success btn-flat btn-full" id="apply">充值</button>
    <button class="btn btn-primary btn-flat btn-full" id="help">如何充值</button>
</div>
</body>
@include('wechat.bottom-nav')
<script>
    $("#apply").click(function () {
        location.href = 'http://www.taltic.com/php/bank_pay.php?price='+$("#price").val()+'&uid={{ session('wechatDb.uid') }}'
    })
    $("#help").click(function () {
        location.href = 'http://www.taltic.com/pay_help.jpeg';
    })

</script>
</html>
