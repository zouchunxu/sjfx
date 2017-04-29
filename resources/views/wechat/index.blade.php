<html>
<head>
    <title>首页</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/assets/wechat/base.css">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/assets/wechat/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
<div class="container">
    <div class="tip">
        <span class="fa fa-volume-up"></span>&nbsp;测试一下
    </div>
    <div class="banner">
        <ul>
            <li style="background-image: url('/assets/img/unslider/sunset.jpg');">
                <div class="inner">
                    {{--<h1>The jQuery slider that just slides.</h1>--}}
                    {{--<p>No fancy effects or unnecessary markup, and it’s less than 3kb.</p>--}}

                    {{--<a class="btn" href="#download">Download</a>--}}
                </div>
            </li>
            <li style="background-image: url('/assets/img/unslider/wood.jpg');">
                <div class="inner">
                    {{--<h1>Fluid, flexible, fantastically minimal.</h1>--}}
                    {{--<p>Use any HTML in your slides, extend with CSS. You have full control.</p>--}}

                    {{--<a class="btn" href="#download">Download</a>--}}
                </div>
            </li>

            <li style="background-image: url('/assets/img/unslider/subway.jpg');">
                <div class="inner">
                    {{--<h1>Open-source.</h1>--}}
                    {{--<p>Everything to do with Unslider is hosted on GitHub.</p>--}}

                    {{--<a class="btn" href="#">Contribute</a>--}}
                </div>
            </li>

            <li style="background-image: url('/assets/img/unslider/shop.jpg');">
                <div class="inner">
                    {{--<h1>Uh, that’s about it.</h1>--}}
                    {{--<p>I just wanted to show you another slide.</p>--}}

                    {{--<a class="btn" href="#download">Download</a>--}}
                </div>
            </li>
        </ul>
    </div>
    <div class="nav">
        <div class="nav-item">
            <div class="icon"></div>
            <div class="title">
                我的农场
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="nav-item">
            <div class="icon"></div>
            <div class="title">
                我的牧场
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="nav-item">
            <div class="icon"></div>
            <div class="title">
                我的果园
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="nav-item">
            <div class="icon"></div>
            <div class="title">
                我的鱼塘
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="ad">

    </div>
    <div class="list"></div>
</div>
</body>
<script src="/assets/js/jquery-2.0.3.min.js"></script>
<script src="/assets/js/layer/layer.js"></script>
<script type="text/javascript" src="/assets/js/unslider.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        if (window.chrome) {
            $('.banner li').css('background-size', '100% 100%');
        }

        $('.banner').unslider({

            fluid: true,
            dots: true
        });
    });

</script>

</html>