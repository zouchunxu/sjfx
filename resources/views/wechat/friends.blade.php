<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	@include('wechat.base')
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<style>
	.table {margin-bottom: 1px!important;}
	.btn-full {width: 100%}

	.invite-qrcode {background: rgb(239,239,239);}
	.user-info {background: rgb(172,116,138); width: 100%; height: 110px;}
	.user-info .col-xs-4 {
		height: 100%; text-align: right;
	}
	.user-info .col-xs-4 img {
		border: 1px white solid;
	    width: 80px;
	    border-radius: 50%;
	    overflow: hidden;
	    height: 80px;
	    position: relative;
	    top: 25px;
	}
	.user-info .col-xs-8 div {color: white; line-height: 25px;}
	.user-info .col-xs-8 div:nth-child(1) {margin-top: 30px;}
	.invite-qrcode .invite {height: 500px; text-align: center}
	.invite .qrcode {width: 150px; height: 150px; border: 1px solid white; overflow: hidden;}
	.invite button {width: 70%;}
	.mt-20 {margin-top: 20px!important;}

	.nav-tabs-custom>.nav-tabs>li {
		border-bottom: 3px solid transparent;
		border-top: 0px!important;
		margin-bottom: 0px!important;
		width: calc(33.3% - 5px);
		text-align: center;
	}
	.nav-tabs-custom>.nav-tabs>li.active {
	    border-bottom-color: #3c8dbc;
	    border-top: 0px;
	}
	.nav-tabs-custom {box-shadow: inherit!important;}
	.tab-content {padding-left: 0!important; padding-right: 0!important}
	.friends {background: rgb(239,239,239); height: 100%;}
</style>
<body>
	<div class="friends">
		<div class="user-info">
			<div class="col-xs-4">
				<img src="{{ session('wechatDb.head') }}" alt=""/>
			</div>
			<div class="col-xs-8">
				<div>会员ID：{{ session('wechatDb.uid') }}</div>
				<div>昵称：{{ session('wechatDb.nick_name') }}</div>
				<div>推荐人：{{ !empty($user['super_info']) ? $user['super_info']['nick_name'] : '无' }}</div>
			</div>
		</div>
		<div class="nav-tabs-custom mt-10">
			<ul class="nav nav-tabs">
				<li class="active" onClick="checkoutTab(0)">
					<a href="javascript:void(0)" data-toggle="tab" aria-expanded="false">一级</a>
				</li>
				<li onClick="checkoutTab(1)">
					<a href="javascript:void(0)" data-toggle="tab" aria-expanded="false">两级</a>
				</li>
				<li onClick="checkoutTab(2)">
					<a href="javascript:void(0)" data-toggle="tab" aria-expanded="false">三级</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active no-padding">
					<table class="table table-bordered">
						
						<tbody>
							<tr>
								<td>登录名/会员ID</td>
								<td>层级</td>
								<td>种植果实数</td>
							</tr>
							<tr>
								@if(!empty($user['one']))
									@foreach($user['one'] as $one)
										<tr>
											<td>{{ !empty($one['name']) ? $one['name'] : '' }}</td>
											<td>一</td>
											<td>{{ !empty($one['level']) ? $one['level'] : 0 }}</td>
										</tr>
									@endforeach
								@endif


								{{--<td>1</td>--}}
								{{--<td></td>--}}
								{{--<td></td>--}}
							</tr>
						</tbody>
					</table>
				</div>
				<div class="tab-pane no-padding">
					<table class="table table-bordered">
						
						<tbody>
							<tr>
								<td>登录名/会员ID</td>
								<td>层级</td>
								<td>种植果实数</td>
							</tr>
							<tr>
								@if(!empty($user['two']))
									@foreach($user['two'] as $two)
										<tr>
											<td>{{ !empty($two['name']) ? $two['name'] : '' }}</td>
											<td>二</td>
											<td>{{ !empty($two['level']) ? $two['level'] : 0 }}</td>
										</tr>
									@endforeach
								@endif
							</tr>
						</tbody>
					</table>
				</div>
				<div class="tab-pane no-padding">
					<table class="table table-bordered">
						
						<tbody>
							<tr>
								<td>登录名/会员ID</td>
								<td>层级</td>
								<td>种植果实数</td>
							</tr>
							<tr>
								@if(!empty($user['three']))
									@foreach($user['three'] as $three)
										<tr>
											<td>{{ !empty($three['name']) ? $three['name'] : '' }}</td>
											<td>三</td>
											<td>{{ !empty($three['level']) ? $three['level'] : 0 }}</td>
										</tr>

									@endforeach
								@endif
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</div>
	@include('wechat.bottom-nav')
</body>
<script>
	function checkoutTab(i) {
		$('.nav-tabs li').removeClass('active').eq(i).addClass('active');
		$('.tab-content .tab-pane').removeClass('active').eq(i).addClass('active')
	}
</script>
</html>