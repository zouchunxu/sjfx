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

    <form id="register_data" action="{{ route("admin::ware.upd") }}" method="post" >
        {{ csrf_field() }}
        <div class="row" >
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget flat radius-bordered">
                    <div class="widget-header bg-blue">
                        <span class="widget-caption">添加商品</span>
                    </div>
                    <div class="widget-body">
                        <div id="registration-form">
                            @if(!empty($ware->id))
                                <input type="hidden" name="id" value="{{ empty($ware->id) ? '': $ware->id }}">
                            @endif
                                <div class="form-title">
                                    商品信息
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input name="name" value="{{ empty($ware->name)? '' :$ware->name }}" type="text" class="form-control"
                                               id="userameInput" placeholder="商品名称">
                                        <i class="glyphicon glyphicon-user circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input name="logo" type="file" class="form-control"
                                               id="logo" placeholder="商品图片">
                                        <i class="glyphicon glyphicon-user circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                         <select id="e2" style="width: 100%;" name="type">
                                             @foreach($categorys as $category)
                                                 <option value="{{ $category->id }}" {{ !empty($ware->category_id) && $ware->category_id == $category->id   ? 'selected' :'' }} />{{ $category->name }}
                                             @endforeach

                                            </select>
                                        {{--<input name="name" value="{{ empty($ware->type)? '' :$ware->name }}" type="text" class="form-control"--}}
                                               {{--id="userameInput" placeholder="分类类型">--}}
                                        <i class="fa fa-align-justify circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-xs-12">
                                            <div class="widget flat radius-bordered">
                                                <div class="widget-header bordered-bottom bordered-themeprimary">
                                                    <span class="widget-caption">商品详情</span>
                                                    <div class="widget-buttons">
                                                        <a href="#" data-toggle="maximize">
                                                            <i class="fa fa-expand"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="widget-body">
                                                    <div class="widget-main no-padding">
                                                        <div id="summernote"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <button {{ !empty($ware->id) ? 'type=submit' : 'type=button id=sub' }} class="btn btn-blue" >{{ !empty($ware->id) ? '修改' : '添加' }}</button>
                                <button type="reset" id="reset" class="btn btn-blue">重置</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script src="/assets/js/select2/select2.js"></script>
    <script src="/assets/js/editors/summernote/summernote.js"></script>
    <script src="/assets/js/ajaxfileupload.js"></script>
    <script src="/assets/js/common.js"></script>

    <script type="text/javascript">
        $('#summernote').summernote({ height: 300 });
        $("#e2").select2({
            placeholder: "分类",
            allowClear: true
        });

        $("#sub").click(function(){
            var param = $("#register_data").serialize();
            $.ajaxFileUpload
            (
                {
                    url: "{{ route("admin::ware.add") }}",
                    secureuri: false, //是否需要安全协议，一般设置为false
                    fileElementId: 'logo', //文件上传域的ID
                    data:$.par2Json(param),
                    dataType: 'json', //返回值类型 一般设置为json
                    success: function (data, status)  //服务器成功响应处理函数
                    {
                        if(data.error == 0){
                            layer.msg(data.msg);
                            $("#reset").click();
                        }else{
                            layer.msg('添加商品失败！');
                        }
                    },
                    error: function (error, status, e)//服务器响应失败处理函数
                    {
                        var json = eval('('+error.responseText+')');
                        for(var i in json) {
                            layer.msg(json[i][0]);
                            return;
                        }
                    }
                }
            )
            {{--$.ajax({--}}
                {{--url: "{{ route("admin::ware.add") }}",--}}
                {{--data:param,--}}
                {{--type:'POST',--}}
                {{--dataType:'json',--}}
                {{--success: function(data){--}}
                    {{--if(data.error == 0){--}}
                        {{--layer.msg(data.msg);--}}
                        {{--$("#reset").click();--}}
                    {{--}else{--}}
                        {{--layer.msg('添加商品失败！');--}}
                    {{--}--}}
                {{--},--}}
                {{--error:function(error){--}}
                    {{--var json = eval('('+error.responseText+')');--}}
                    {{--for(var i in json) {--}}
                        {{--layer.msg(json[i][0]);--}}
                        {{--return;--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}

        });
    </script>
@endsection
