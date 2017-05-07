<html>
<head>
    <title>提现记录</title>
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
        <thead>
            <tr>
                <th>日期</th>
                <th>金额(元)</th>
                <th>银行账户</th>
                <th>状态</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lists as $list)
            <tr>
                <td>{{ $list->created_at }}</td>
                <td>{{ $list->price }}</td>
                <td>{{ $list->id_card }}</td>
                <td>{{ $list->status ? '申请成功' : '待审核' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
@include('wechat.bottom-nav')
<script>

</script>
</html>
