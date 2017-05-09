<html>
<head>
    <title>现代农场</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/assets/wechat/base.css">
    <link rel="stylesheet" href="/assets/wechat/good.css">
    @include('wechat.base')
</head>
<body>
<div class="shop">
    <div class="coupon-ad">
        <img src="/assets/img/ppt.jpeg" alt=""/>
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
                认养商城
                <i class="iconfont pull-right mr-5"></i>
            </div>
            <div class="goods">
                @if(!empty($normallyShop))
                    @foreach($normallyShop as $list)
                        <div class="list-item">
                            <div class="logo">
                                <img src="{{ $list->logo }}" alt="">
                            </div>
                            <div class="title">
                                <div class="name">
                                    {{ mb_substr($list->title,0,10) }}
                                </div>
                                <div class="other">
                                    <div class="price">
                                        ¥{{ number_format($list->trait['price'],2) }}
                                    </div>
                                    <a class="detail" href="/good/detail?id={{ $list->id }}">
                                        详情 >
                                    </a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif
            </div>
        </div>
        <div class="tab-content clear">
            <div class="content-header">
                积分商城
                <i class="iconfont pull-right mr-5"></i>
            </div>
            <div class="goods">
                @if(!empty($integralShop))
                    @foreach($integralShop as $list)
                        <div class="list-item">
                            <div class="logo">
                                <img src="{{ $list->logo }}" alt="">
                            </div>
                            <div class="title">
                                <div class="name">
                                    {!! mb_substr($list->title,0,10) !!}
                                </div>
                                <div class="other">
                                    <div class="price">
{{--                                        ¥{{ number_format($list->trait['price'],2) }}--}}
                                    </div>
                                    <a class="detail" href="/good/detail?id={{ $list->id }}">
                                        详情 >
                                    </a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif
            </div>
        </div>
        <div class="tab-content clear">
            <div class="content-header">
                养护商城
                <i class="iconfont pull-right mr-5"></i>
            </div>
            <div class="goods">
                @if(!empty($otherShop))
                    @foreach($otherShop as $list)
                        <div class="list-item">
                            <div class="logo">
                                <img src="{{ $list->logo }}" alt="">
                            </div>
                            <div class="title">
                                <div class="name">
                                    {{ mb_substr($list->title,0,10) }}
                                </div>
                                <div class="other">
                                    <div class="price">
                                        ¥{{ number_format($list->trait['price'],2) }}
                                    </div>
                                    <a class="detail" href="/good/detail?id={{ $list->id }}">
                                        详情 >
                                    </a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif
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
