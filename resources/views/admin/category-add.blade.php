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

    <form id="register_data" action="{{ route("admin::category.upd") }}" method="post" >
        {{ csrf_field() }}
        <div class="row" >
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget flat radius-bordered">
                    <div class="widget-header bg-blue">
                        <span class="widget-caption">添加分类</span>
                    </div>
                    <div class="widget-body">
                        <div id="registration-form">
                            @if(!empty($category->id))
                                <input type="hidden" name="id" value="{{ empty($category->id) ? '': $category->id }}">
                            @endif
                                <div class="form-title">
                                    分类信息
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        <input name="name" value="{{ empty($category->name)? '' :$category->name }}" type="text" class="form-control"
                                               id="userameInput" placeholder="分类名称">
                                        <i class="glyphicon glyphicon-user circular"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                         <select id="e2" style="width: 100%;" name="type">
                                             @foreach($categoryTypes as $key => $categoryType)
                                                 <option value="0" {{ !empty($category->type) && $category->type == $key  ? 'selected' :'' }} />{{ $categoryType }}
                                             @endforeach
                                                {{--<option value="1" {{ !empty($category->type) && $category->type == 1  ? 'selected' :'' }} />果园--}}
                                                {{--<option value="2" {{ !empty($category->type) && $category->type == 2  ? 'selected' :'' }}/>牧场--}}
                                                {{--<option value="3" {{ !empty($category->type) && $category->type == 3  ? 'selected' :'' }}/>鱼塘--}}
                                                {{--<option value="4" {{ !empty($category->type) && $category->type == 4  ? 'selected' :'' }}/>管家--}}
                                                {{--<option value="5" {{ !empty($category->type) && $category->type == 5  ? 'selected' :'' }}/>粮食--}}
                                            </select>
                                        {{--<input name="name" value="{{ empty($category->type)? '' :$category->name }}" type="text" class="form-control"--}}
                                               {{--id="userameInput" placeholder="分类类型">--}}
                                        <i class="fa fa-align-justify circular"></i>
                                    </span>
                                </div>
                                <button {{ !empty($category->id) ? 'type=submit' : 'type=button id=sub' }} class="btn btn-blue" >{{ !empty($category->id) ? '修改' : '添加' }}</button>
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
    <script type="text/javascript">

        $("#e2").select2({
            placeholder: "分类类型",
            allowClear: true
        });

        $("#sub").click(function(){
            var param = $("#register_data").serialize();

            $.ajax({
                url: "{{ route("admin::category.add") }}",
                data:param,
                type:'POST',
                dataType:'json',
                success: function(data){
                    if(data.error == 0){
                        layer.msg(data.msg);
                        $("#reset").click();
                    }else{
                        layer.msg('添加分类失败！');
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
