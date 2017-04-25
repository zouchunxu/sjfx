@extends('admin/layout')

@section('css')

@endsection


@section('main')
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="well with-header  with-footer">
                <div class="header bg-blue">
                    分类列表
                </div>
                <table class="table table-hover">
                    <thead class="">
                    <tr>

                        <th class="text-center">
                            #
                        </th>
                        <th class="text-center">
                            分类名称
                        </th>
                        <th class="text-center">
                            分类类型
                        </th>
                        <th class="text-center">
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody id="category-data">

                    </tbody>
                </table>

                <div class="footer text-center">
                    <ul class="pagination" id="page">
                        {{--                        <li class="disabled"><a href="#">«</a></li>
                                                <li class="active" id="test"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                                <li><a href="#">»</a></li>--}}
                    </ul>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('js')
    <script type="text/javascript">

        var types = [];
        function page(page) {
            $.post('{{ route('admin::category.index') }}', {'page': page}, function (data) {

                var count = (page - 1) * 15;

                var userdata = eval('(' + data.data + ')');
                setUserData(userdata.data, count);

                $("#page").html(data.page);
            });
        }

        function setUserData(data, count) {
            var html = '';
            for (var i in data) {
                html += '<tr class="text-center">';
                html += '<td>' + (++count) + '</td>';
                html += '<td>' + data[i].name + '</td>';
                html += '<td>' + getType(data[i].type) + '</td>';
                html += '<td><a href="{{ route("admin::category.upd") }}?id=' + data[i].id + '">编辑</a> / <a href="javascript:;" onclick="del(' + data[i].id + ',this)">删除</a></td>';
                html += '</tr>';
            }
            //   alert(html);
            $("#category-data").html(html);

        }
        $.get('/config/category-types',function(data){
            types = data;
            page(1);
        });
        function getType(type){
            console.log(types[type]);
            return String(types[type]);
        }

        function del(id,obj) {

            layer.open({
                'title': '删除分类',
                'content': '你确定要删除这个分类吗?',
                'btn': ['删除', '取消'],
                'yes': function () {
                    $.post('{{ route("admin::category.del") }}', {'id': id}, function (data) {

                        if(data.error == 0){
                            $(obj).parents('tr').fadeOut('600');
                        }
                        layer.msg(data.msg);
                    });
                }
            });
        }


    </script>
@endsection
