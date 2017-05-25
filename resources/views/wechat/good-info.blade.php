<html>
<head>
    <title>商品详情</title>
    <meta charset="utf-8"/>
    @include('wechat.base')
    <link rel="stylesheet" href="/assets/wechat/good.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <style>
        .good-img img {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .good-name {
            font-size: 20px;
            color: black;
            line-height: 50px;
            padding-left: 10px;
            border-bottom: 1px solid #d5d5d5
        }

        .good-attr {
            font-size: 16px;
            color: black;
            line-height: 40px;
            padding-left: 10px !important;
            border-bottom: 1px solid #d5d5d5
        }

        .good-attr span {
            display: inline-block;
            text-align: center;
            width: 81px;
            border-right: 1px solid #d5d5d5
        }

        .good-footer {
            width: 100%;
        }

        .good-footer .col-xs-6 label {
            font-weight: 400;
        }

        .good-footer .col-xs-6:nth-child(2) {
            padding: 0;
        }

        .good-footer .col-xs-6:nth-child(2) button {
            width: 100%;
            font-weight: bold;
            line-height: 31px;
        }

        .form-inline {
            float: left;
            margin: 2px 0px;
        }

        .form-inline .form-control {
            float: right;
            width: calc(100% - 55px);
            vertical-align: middle;
            margin-top: 5px
        }

    </style>
</head>
<body>
<div>
    <div class="good-img">
        <img src="/{{ $good->logo }}" alt=""/>
    </div>
    <div class="good-name">
        {{ $good->title }}
    </div>
    @if(is_array($good->trait))
        @foreach($good->trait as $key => $val)
            <div class="good-attr">
                <span>{{ !empty($types[$key]) ? $types[$key]['desc'] : '属性'}}：</span>
                {{ $val }}{{ !empty($types[$key]['unit']) ? $types[$key]['unit'] : '' }}
            </div>

        @endforeach
    @endif
    @if(!empty( $good->summary))
        <div class="good-attr">
            <span>简介：</span>
            {{ $good->summary }}
        </div>
    @endif
    <div class="good-footer">
        <div class="col-xs-6 good-attr">
        <div class="form-inline">
        数量：<input type="number" class="form-control input-sm" value="1" disabled/>
        </div>
        </div>
        <div class="col-xs-6">
            <button class="btn btn-danger btn-flat" id="buy">立即购买</button>
        </div>
    </div>
    <div style="width: 100%;overflow: hidden;">
        {!! $good->desc !!}
        <div style="clear: both"></div>
    </div>
</div>
</body>
@include('wechat.bottom-nav')
<script>
    var wareId = '{{ $good->id }}';
    var width = $('body').width();
    $("img").width(width);
    $("#buy").click(function(){
        $.post("/good/buy", {'ware_id': wareId}, function (data) {
            layer.msg(data.msg);
        });
    });

</script>
</html>
