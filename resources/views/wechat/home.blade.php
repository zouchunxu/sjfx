<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	@include('wechat.base')
	<style>
		.custom-map a {
			position: absolute;
			left: 0;
		}
	</style>
</head>
<body style="height: calc(100% - 46px)">
	<div class="my-manor" style="height: 100%">
		<img src="/assets/img/my-manor1.png" alt="manor" style="width: 100%;height: 100%"/>

		<div class="custom-map">
			<a href="/good/my-goods?cid=7"></a>
			<a href="/good/my-goods?cid=8"></a>
			<a href="/good/my-goods?cid=1"></a>
			{{--<a href="/good/my-goods?cid=4"></a>--}}
		</div>
	</div>
	@include('wechat.bottom-nav')
</body>
<script>
	$(function() {
	    $(".block").css('display','none');

		var clientH = $('.bottom-nav')[0].offsetTop;
		var clientW = $('.bottom-nav')[0].clientWidth;
		clientH = clientH < 598 ? 598 : clientH;
//		$('.my-manor img').css('height', clientH+'px');
		var cnt = 3;
		var average = clientH / cnt;
		var a_doms = $('.my-manor .custom-map a');
		for( var i = 1 ; i <= cnt ; i ++ ) {
			var top = (i-1) * average;
			$(a_doms[i-1]).css('width', clientW+'px').css('height', average).css('top', top+'px');
		}
	});
</script>
</html>