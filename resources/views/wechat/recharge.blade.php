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
    </style>
</head>
<body>
<div>
    <table class="table table-bordered">
        <tbody>
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
</div>
</body>
@include('wechat.bottom-nav')
<script>
    $("#apply").click(function () {
        location.href = 'http://www.taltic.com/php/bank_pay.php?price='+$("#price").val()+'&uid={{ session('wechatDb.uid') }}'
    })
</script>
</html>
