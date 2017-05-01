@extends('admin/layout')

@section('main')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="register_data" action="/useredit" method="post" >
        {{ csrf_field() }}
        <div class="row" >
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget flat radius-bordered">
                    <div class="widget-header bg-blue">
                        <span class="widget-caption">添加会员</span>
                    </div>
                    <div class="widget-body">
                        <div id="registration-form">
                                <input type="hidden" name="uid" value="{{ empty($user->uid) ? '': $user->uid }}">
                                <div class="form-title">
                                    会员资料
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input name="name" value="{{ empty($user->name)? '' :$user->name }}" type="text" class="form-control"
                                               id="userameInput" placeholder="会员名称">
                                        <i class="glyphicon glyphicon-user circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control"
                                               id="emailInput" value="{{ empty($user->email)?'':$user->email }}" name="email" placeholder="会员邮箱">
                                        <i class="fa fa-envelope-o circular"></i>
                                    </span>
                                </div>
                                {{--<div class="form-group">--}}
                                    {{--<span class="input-icon icon-right">--}}
                                        {{--<input type="text" class="form-control" name="password"--}}
                                               {{--id="passwordInput" placeholder="登陆密码">--}}
                                        {{--<i class="fa fa-lock circular"></i>--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<span class="input-icon icon-right">--}}
                                        {{--<input type="text" class="form-control"--}}
                                               {{--id="confirmPasswordInput" name="password_confirmation"--}}
                                               {{--placeholder="确认密码">--}}
                                        {{--<i class="fa fa-lock circular"></i>--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input type="text" value="{{ empty($user->qq_code)?'':$user->qq_code }}" class="form-control"
                                               name="qq_code"
                                               placeholder="qq号码">
                                        <i class="fa fa-qq circular"></i>
                                    </span>
                                </div>
       {{--                         <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input type="file" class="form-control"
                                               name="head"
                                               placeholder="会员头像">
                                        <i class="fa  fa-upload circular"></i>
                                    </span>
                                </div>--}}
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control"
                                               name="phone" value="{{ empty($user->phone)?'':$user->phone }}"
                                               placeholder="手机号码">
                                        <i class="fa  fa-phone circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control"
                                               name="integral" value="{{ empty($user->integral)?'':$user->integral }}"
                                               placeholder="会员积分">
                                        <i class="fa fa-stack-overflow circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control"
                                               name="actual_name" value="{{ empty($user->actual_name)?'':$user->actual_name }}"
                                               placeholder="真实姓名">
                                        <i class="fa  fa-renren circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control"
                                               name="id_card" value="{{ empty($user->id_card)?'':$user->id_card }}"
                                               placeholder="身份证号码">
                                        <i class="fa  fa-credit-card circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control"
                                               name="nick_name" value="{{ empty($user->nick_name)?'':$user->nick_name }}"
                                               placeholder="会员昵称">
                                        <i class="fa fa-user-md circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control"
                                               name="out_money" value="{{ empty($user->out_money)?'':$user->out_money }}"
                                               placeholder="出金">
                                        <i class="fa fa-angle-left circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control"
                                               name="in_money" value="{{ empty($user->in_money)?'':$user->in_money }}"
                                               placeholder="入金">
                                        <i class="fa fa-angle-right circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control"
                                               name="real_gold" value="{{ empty($user->real_gold)?'':$user->real_gold }}"
                                               placeholder="真实金币">
                                        <i class="fa fa-strikethrough circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control"
                                               name="virtual_gold" value="{{ empty($user->virtual_gold)?'':$user->virtual_gold }}"
                                               placeholder="虚拟金币">
                                        <i class="fa fa-strikethrough circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input type="text" class="form-control"
                                               name="welfare" value="{{ empty($user->welfare)?'':$user->welfare }}"
                                               placeholder="福利金币">
                                        <i class="fa fa-strikethrough circular"></i>
                                    </span>
                                </div>
                                <button {{ !empty($user->uid) ? 'type=submit' : 'type=button id=sub' }} class="btn btn-blue" >{{ !empty($user->uid) ? '修改' : '注册' }}</button>
                                <button type="reset" id="reset" class="btn btn-blue">重置</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script type="text/javascript">
        $("#sub").click(function(){
            var param = $("#register_data").serialize();

            $.ajax({
                url: "/useradd",
                data:param,
                type:'POST',
                dataType:'json',
                success: function(data){
                    if(data.error == 0){
                        layer.msg(data.msg);
                        $("#reset").click();
                    }else{
                        layer.msg('添加会员失败！');
                    }
                },
                error:function(error){
                    var json = eval('('+error.responseText+')');
                    for(var i in json) {
                        layer.msg(json[i][0]);
                        return;
                    }
                }
            });

        });
    </script>
@endsection
