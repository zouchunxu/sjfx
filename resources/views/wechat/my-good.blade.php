<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	@include('wechat.base')
	<style>
		body {background: rgb(239,239,239)}
		.tabset {height:38px;}
		.tabset .col-2 {font-size: 16px;}
		.tabset .col-2 div {
			padding: 1px 10px;
		    width: 70px;
		    margin: 0 auto;
		    border: 2px solid #008800;
		    border-radius: 20px;
		    font-size: 14px;
		    color: white;
			font-weight: border
		}
		.tabset .col-2.active div{
			color: black;
		}
		.tabset .col-2.active i{
			display: block;
		}
		.tabset .col-2 i {
			border: 8px solid;
			border-color: transparent transparent white transparent;
			display: block;
		    width: 0;
		    margin: 0 auto;
		    position: relative;
		    top: -5px;
		    display: none;
		}
		.good-list {
			background: white;
			width: 100%;
			position: relative;
			top: -5px;
			display: none;
		}
		.good-list .item {
			position: relative;
			padding: 10px 15px;
		}
		.good-list .item img {
			width: 40%;
			height: 100px;
		}
		.item .item-info {
			width: calc(60% - 5px);
		}
		.item .result {
			position: absolute;
		    top: 3px;
		    font-size: 12px;
		    left: 40%;
		    width: 60%;
		}
		.item .result div {font-size: 12px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;
				width: 100%; height: 15px;}
		.item .relative>div:first-child {height: 40px; line-height: 40px; width: 40%;}
		.item .item-process>div:first-child {line-height: 50px}
		.item-process-time {color: green; font-size: 12px; position: relative; left: 10px;}
		.item-process-bar {
			height: 10px;
		    margin-left: 10px;
		    background: lightgreen;
		    border-radius: 5px;
		    margin-top: 6px;
		    position: relative;
		}
		.item-process-bar div {position: absolute; width: 10px; height: 10px; border-radius: 50%; background: green;}
		.item-process-status {position: relative; margin-left: 10px; height: 25px; top: 10px;}
		.item-process-status div {font-size: 13px; position: absolute;}
		.item-process-bar div:nth-child(1) {left: calc(33.3% - 10px);}
		.item-process-bar div:nth-child(2) {left: calc(66.7% - 10px);}
		.item-process-bar div:nth-child(3) {left: calc(100% - 10px);}
		.item-process-status div:nth-child(1) {left: calc(33.3% - 12px)}
		.item-process-status div:nth-child(2) {left: calc(66.7% - 12px)}
		.item-process-status div:nth-child(3) {left: calc(100%  - 12px)}
		.process-info {width: calc(100% - 33px); float: left;}

		.relative {position: relative;}
		.bg-green {background: green;}
		.process-info a{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="manor">
		<div class="tabset mt-10">
			<div class="col-2"
					onClick="selectTab(0)">
				<div class="text-center bg-green border-green">
					未&nbsp;&nbsp;熟
				</div>
				<i class="up-icon"></i>
			</div>
			<div class="col-2"
					onClick="selectTab(1)">
				<div class="text-center bg-green border-green">
					已&nbsp;&nbsp;熟
				</div>
				<i class="up-icon"></i>
			</div>
		</div>

		<div class="good-list">
			@foreach($goods1 as $item)
				<div class="item">
					<img src="/{{ $item->ware->logo }}" alt="" class="pull-left"/>
					<div class="pull-left ml-5 item-info">
						<div class="relative">
							<div>{{ $item->ware->title }} * 1</div>
							<div class="result">
								<div>购买价格：￥{{ number_format($item->ware->trait['price'],2) }}</div>
								<div>当前收益：{{$item->ware->trait['income']}}%</div>
							</div>
						</div>
						<div class="item-process">
							<div class="pull-left">
								进程
							</div>
							<div class="process-info">
								<div class="item-process-time">
									{{ intval($item->ware->trait['expired']-((time()-strtotime($item->created_at))/60/60)) }}小时后成熟
{{--									{{ $item->created_at }}--}}
								</div>
								<div class="item-process-bar">
									<div></div>
									<div></div>
									<div></div>
								</div>
								<div class="item-process-status">
									<div>小</div>
									<div>中</div>
									<div>大</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<div style="clear: both"></div>
			@endforeach

		</div>

		<div class="good-list">
			@foreach($goods2 as $item)
				<div class="item">
					<img src="/{{ $item->ware->logo }}" alt="" class="pull-left"/>
					<div class="pull-left ml-5 item-info">
						<div class="relative">
							<div>{{ $item->ware->title }} * 1</div>
							<div class="result">
								<div>购买价格：￥{{ number_format($item->ware->trait['price'],2) }}</div>
								<div>当前收益：{{$item->ware->trait['income']}}%</div>
							</div>
						</div>
						<div class="item-process">
							<div class="pull-left">
								进程
							</div>
							<div class="process-info">
								<div class="item-process-time" onclick="reward('{{ $item->id }}',this)">
									点击收获
								</div>
								<div class="item-process-bar">
									<div></div>
									<div></div>
									<div></div>
								</div>
								<div class="item-process-status">
									<div>小</div>
									<div>中</div>
									<div>大</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div style="clear: both"></div>
			@endforeach
		</div>
	</div>
</body>
@include('wechat.bottom-nav')
<script>
	function selectTab(i) {
		$('tabset .col-2 div').css('color', 'white').eq(i).css('color', 'black');
		$('.tabset .col-2 i.up-icon').css('display', 'none').eq(i).css('display', 'block');
		$('.manor .good-list').css('display', 'none').eq(i).css('display', 'block')
	}


	function reward(id,obj){
        $.post('/good/reward',{'id':id},function(data){
            if(data.error == 0){
                $(obj).parents('.item').fadeOut(600);
            }
            layer.msg(data.msg);
        });
    }

    selectTab(0);
</script>
</html>