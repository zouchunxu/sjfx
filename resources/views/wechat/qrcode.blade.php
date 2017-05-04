<html>
<head>
    <title>邀请码</title>
    <meta charset="utf-8"/>
    @include('wechat.base')
    <link rel="stylesheet" href="/assets/wechat/good.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <style>
        .table {margin-bottom: 1px!important;}
        .btn-full {width: 100%}

        .invite-qrcode {font-size: 1.0em;}
        body {background: rgb(239,239,239);}
        .user-info {background: rgb(172,116,138); width: 100%; height: 110px;}
        .user-info .col-xs-4 {
            height: 100%; text-align: right;
        }
        .user-info .col-xs-4 img {
            border: 1px white solid;
            width: 80px;
            border-radius: 50%;
            overflow: hidden;
            height: 80px;
            position: relative;
            top: 25px;
        }
        .user-info .col-xs-8 div {color: white; line-height: 25px;}
        .user-info .col-xs-8 div:nth-child(1) {margin-top: 30px;}
        .invite-qrcode .invite { text-align: center}
        .invite .qrcode {width: 200px; height: 200px; border: 1px solid white; overflow: hidden;}
        .invite button {width: 70%;}
        .mt-20 {margin-top: 20px!important;}
    </style>
</head>
<body>
    <div class="invite-qrcode">
        <div class="user-info">
            <div class="col-xs-4">
                <img src="{{ session('wechatDb.head') }}" alt=""/>
            </div>
            <div class="col-xs-8">
                <div>会员ID：{{ session('wechatDb.uid') }}</div>
                <div>昵称：{{ session('wechatDb.nick_name') }}</div>
                {{--<div>推荐人：</div>--}}
            </div>
        </div>
        <div class="invite">
            <div class="mt-20">你的好友{{ session('wechatDb.nick_name') }}，邀请你注册</div>
            <div class="mt-10">
                <img src="{{ $qrcode }}" alt="" class="qrcode"/>
            </div>
            {{--<div class="mt-20">--}}
                {{--<button class="btn btn-primary">立即注册</button>--}}
            {{--</div>--}}
            {{--<div class="mt-20">--}}
                {{--http://www.baidu.com--}}
            {{--</div>--}}
        </div>
    </div>
</body>
@include('wechat.bottom-nav')
<script>

</script>
</html>
