<link href="/assets/css/font-awesome.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="/assets/wechat/base.css">
<script src="/assets/js/jquery-2.0.3.min.js"></script>
<script src="/assets/js/layer/layer.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>