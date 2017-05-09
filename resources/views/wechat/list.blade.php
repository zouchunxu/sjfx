<html>
<head>
    <title>列表</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/assets/wechat/list.css">
    @include('wechat.base')
</head>
<body>
<div class="list">
    @foreach($lists as $list)
        <div class="list-item">
            <div class="logo">
                <img src="/{{ $list->logo }}" alt="">
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
</div>
@include('wechat.bottom-nav')
</body>
</html>