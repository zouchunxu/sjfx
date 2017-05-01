<html>
    <head>
        <title>用户中心</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="/assets/wechat/user.css">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        @include('wechat.base')
    </head>
    <body>
   {{--
   array(23) {
  ["uid"]=>
  int(2)
  ["name"]=>
  string(5) "Dream"
  ["email"]=>
  string(0) ""
  ["phone"]=>
  string(0) ""
  ["sex"]=>
  string(3) "男"
  ["actual_name"]=>
  string(0) ""
  ["nick_name"]=>
  string(5) "Dream"
  ["access_token"]=>
  string(107) "pYHudELyrMAyBKkMiK2hgAk6vpKYSOnNUYC_N5p0lJt-7ZqaZjzu3iN4z5huTXuc_W7M1TAG6QlRYH91hBT0joP99m9mDzTEowgdQ4cZSvM"
  ["id_card"]=>
  string(0) ""
  ["birthday"]=>
  string(10) "0000-00-00"
  ["qq_code"]=>
  string(0) ""
  ["head"]=>
  string(127) "http://wx.qlogo.cn/mmopen/McYMgia19V0VthFucnHI0jSviaqUJKPicxsJPP3jWO62mHKdPwFw0Aknq1v4nq2acYDwcP5GjqR28xtzXgIZwxVwUyF9dXLsb4I/0"
  ["integral"]=>
  int(0)
  ["topic"]=>
  string(0) ""
  ["out_money"]=>
  string(4) "0.00"
  ["in_money"]=>
  string(4) "0.00"
  ["open_id"]=>
  string(28) "oXe6zvzfh9Y3_es0Myp1GbXybISY"
  ["real_gold"]=>
  string(4) "0.00"
  ["virtual_gold"]=>
  string(4) "0.00"
  ["welfare"]=>
  string(4) "0.00"
  ["deleted_at"]=>
  NULL
  ["created_at"]=>
  string(19) "2017-04-30 16:23:24"
  ["updated_at"]=>
  string(19) "2017-04-30 16:32:03"
}

   --}}
        <div>
            <div class="personal-header">
                <div class="header-bg" ></div>
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
                        <span><strong class="green">•</strong> 农场主级别：普通用户</span>
                    </div>
                    <div class="col-2 mb-10">
                        <span><strong class="green">•</strong> 推荐人：唐波</span>
                    </div>
                    <div class="col-2 mb-5">
                        <span><strong class="green">•</strong> 平台总人数：66666</span>
                    </div>
                    <div class="col-2 mb-5">
                        <span><strong class="green">•</strong> 第几个进入：39182位</span>
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
                <div class="col-4">
                    <div class="tool-img">
                        <img src="" alt=""/>
                    </div>
                    <div>我的资料</div>
                </div>
                <div class="col-4">
                    <div class="tool-img">
                        <img src="" alt=""/>
                    </div>
                    <div>我的二维码</div>
                </div>
                <div class="col-4">
                    <div class="tool-img">
                        <img src="" alt=""/>
                    </div>
                    <div>我的好友</div>
                </div>
                <div class="col-4">
                    <div class="tool-img">
                        <img src="" alt=""/>
                    </div>
                    <div>金币提现</div>
                </div>
                <div class="col-4">
                    <div class="tool-img">
                        <img src="" alt=""/>
                    </div>
                    <div>福利提现</div>
                </div>
                <div class="col-4">
                    <div class="tool-img">
                        <img src="" alt=""/>
                    </div>
                    <div>提现记录</div>
                </div>
                <div class="col-4">
                    <div class="tool-img">
                        <img src="" alt=""/>
                    </div>
                    <div>兑换订单</div>
                </div>
                <div class="col-4">
                    <div class="tool-img">
                        <img src="" alt=""/>
                    </div>
                    <div>分佣中心</div>
                </div>
                <div class="col-4">
                    <div class="tool-img">
                        <img src="" alt=""/>
                    </div>
                    <div>我的管家</div>
                </div>
            </div>
        </div>
    </body>
    @include('wechat.bottom-nav')
</html>