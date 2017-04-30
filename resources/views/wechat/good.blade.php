<html>
<head>
    <title>商品列表</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/assets/wechat/base.css">
    <link rel="stylesheet" href="/assets/wechat/good.css">
    @include('wechat.base')
</head>
<body>
<div class="shop">
    <div class="coupon-ad">
        <img src="" alt=""/>
    </div>

    <div class="tabset mt-5">
        <div class="col-4"
             onClick="selectTab(0)">
            <span>认养商城</span><br/>
            <i class="iconfont"></i>
        </div>
        <div class="col-4"
             onClick="selectTab(1)">
            <span>积分商城</span><br/>
            <i class="iconfont"></i>
        </div>
        <div class="col-4"
             onClick="selectTab(2)">
            <span>养护商城</span><br/>
            <i class="iconfont"></i>
        </div>
        <div class="tab-content clear">
            <div class="content-header">
                类型1
                <i class="iconfont pull-right mr-5"></i>
            </div>
            <div class="goods">
                <div class="list-item">
                    <div class="logo">
                        <img src="/assets/img/unslider/shop.jpg" alt="">
                    </div>
                    <div class="title">
                        <div class="name">
                            测试一下
                        </div>
                        <div class="other">
                            <div class="price">
                                ¥88.00
                            </div>
                            <div class="detail">
                                详情 >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-item">
                    <div class="logo">
                        <img src="/assets/img/unslider/shop.jpg" alt="">
                    </div>
                    <div class="title">
                        <div class="name">
                            测试一下
                        </div>
                        <div class="other">
                            <div class="price">
                                ¥88.00
                            </div>
                            <div class="detail">
                                详情 >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content clear">
            <div class="content-header">
                类型2
                <i class="iconfont pull-right mr-5"></i>
            </div>
            <div class="goods">
                <div class="col-2">

                </div>
                <div class="col-2">

                </div>
                <div class="col-2">

                </div>
            </div>
        </div>
        <div class="tab-content clear">
            <div class="content-header">
                类型3
                <i class="iconfont pull-right mr-5"></i>
            </div>
            <div class="goods">
                <div class="col-2">

                </div>
                <div class="col-2">

                </div>
                <div class="col-2">

                </div>
            </div>
        </div>
    </div>
</div>
</body>
@include('wechat.bottom-nav')
<script>
    function selectTab(i) {
        $('.tabset .col-4 .iconfont').css('display', 'none').eq(i).css('display', 'block');
        $('.tabset .tab-content').css('display', 'none').eq(i).css('display', 'block');
    }
    selectTab(0);
</script>
</html>
