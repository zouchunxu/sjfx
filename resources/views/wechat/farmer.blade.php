<html>
<head>
    <title>我的管家</title>
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
            <th>名称</th>
            <th>到期时间</th>
            {{--<th>姓名</th>--}}
            {{--<th>地址</th>--}}
            {{--<th>联系电话</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($farmer as $list)
            <tr>
                <td>{{ $list->ware->title }}</td>
                <td>{{ date('Y-m-d H:i:s',strtotime("+{$list->expired} hour")) }}</td>
                {{--<td>{{ session('wechatDb.actual_name') }}</td>--}}
                {{--<td>{{ session('wechatDb.full_address') }}</td>--}}
                {{--<td>{{ session('wechatDb.phone') }}</td>--}}
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
