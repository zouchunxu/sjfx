<html>
<head>
    <title>用户中心</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/assets/wechat/user.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    @include('wechat.base')
</head>
<body>
<div>
    <div class="personal-header">
        <div class="header-bg"></div>
        <div class="join-time">
            <div>加入时间</div>
            <div>{{ date('Y-m-d',strtotime(session('wechatDb.created_at'))) }}</div>
        </div>
        <div class="total-money">
            <div>认领总值</div>
            <div>{{ session('wechatDb.out_money') }}</div>
        </div>
        <div class="user-img">
            <img src="{{ session('wechatDb.head') }}" alt="">
        </div>
        <div class="user-name"><strong>{{ session('wechatDb.nick_name') }}</strong></div>

        <div class="user-info">
            <div class="col-2 mb-10">
                <span><strong class="green">•</strong> 农场主级别：{{ $levelName }}</span>
            </div>
            <div class="col-2 mb-10">
                <span><strong
                            class="green">•</strong> 推荐人：{{ is_object($user->superInfo) ? $user->superInfo->nick_name : '无' }}</span>
            </div>
            <div class="col-2 mb-5">
                <span><strong class="green">•</strong> 平台总人数：{{ $count }}</span>
            </div>
            <div class="col-2 mb-5">
                <span><strong class="green">•</strong> 第几个进入：{{ $user->uid }} 位</span>
            </div>
        </div>
    </div>

    <div class="account">
        <div class="col-4 text-center">
            <div>金币账户</div>
            <div class="green">{{ number_format((session('wechatDb.virtual_gold')+session('wechatDb.real_gold')),2) }}</div>
        </div>
        <div class="col-4 text-center">
            <div>积分账户</div>
            <div class="green">{{  number_format(session('wechatDb.integral'),2) }}</div>
        </div>
        <div class="col-4 text-center">
            <div>福利账户</div>
            <div class="green">{{  number_format(session('wechatDb.welfare'),2) }}</div>
        </div>
    </div>

    <div class="tool">
        <a href="/user/user-info">
            <div class="col-4">
                <div class="tool-img">
                    <img src="/assets/img/info.jpeg" alt=""/>
                </div>
                <div>我的资料</div>
            </div>
        </a>
        <a href="/user/qrcode">
            <div class="col-4">
                <div class="tool-img">
                    <img src="/assets/img/qrcode.jpeg" alt=""/>
                </div>
                <div>我的二维码</div>
            </div>
        </a>
        <a href="/user/friends">
        <div class="col-4">
            <div class="tool-img">
                <img src="/assets/img/fireds.jpeg" alt=""/>
            </div>
            <div>我的好友</div>
        </div>
        </a>
        <a href="/user/cash">
            <div class="col-4">
                <div class="tool-img">
                    <img src="/assets/img/cash.jpeg" alt=""/>
                </div>
                <div>金币提现</div>
            </div>
        </a>
        <a href="/user/sum-cash">
            <div class="col-4">
                <div class="tool-img">
                    <img src="/assets/img/sum-cash.jpeg" alt=""/>
                </div>
                <div>福利提现</div>
            </div>
        </a>
        <a href="/user/cash-list">
            <div class="col-4">
                <div class="tool-img">
                    <img src="/assets/img/cash-list.jpeg" alt=""/>
                </div>
                <div>提现记录</div>
            </div>
        </a>
        <a href="/user/convert-list">
            <div class="col-4">
                <div class="tool-img">
                    <img src="/assets/img/convert-list.jpeg" alt=""/>
                </div>
                <div>兑换订单</div>
            </div>
        </a>
        <div class="col-4">
            <div class="tool-img">
                <img src="/assets/img/profir.jpeg" alt=""/>
            </div>
            <div>分佣中心</div>
        </div>
        <a href="/user/recharge">
            <div class="col-4">
                <div class="tool-img">
                    <img src="/assets/img/farmer.jpeg" alt=""/>
                </div>
                <div>金币充值</div>
            </div>
        </a>
    </div>
</div>
</body>
@include('wechat.bottom-nav')
</html>