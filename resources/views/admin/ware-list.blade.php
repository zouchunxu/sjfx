@extends('admin/layout')

@section('css')

@endsection


@section('main')
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="well with-header  with-footer">
                <div class="header bg-blue">
                    商品列表
                </div>
                <table class="table table-hover">
                    <thead class="">
                    <tr>

                        <th class="text-center">
                            #
                        </th>
                        <th class="text-center">
                            商品名称
                        </th>
                        <th class="text-center">
                            分类
                        </th>
                        <th class="text-center">
                            商品图片
                        </th>
                        <th class="text-center">
                            简介
                        </th>

                        <th class="text-center">
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody id="ware-data">

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

        var categorys = [];
        function page(page) {
            $.post('{{ route('admin::ware.index') }}', {'page': page}, function (data) {

                var count = (page - 1) * 15;

                var userdata = eval('(' + data.data + ')');
                setUserData(userdata.data, count);

                $("#page").html(data.page);
            });
        }

        function setUserData(data, count) {
            var html = '';
            for (var i in data) {
                console.log(data);
                console.log(getType(data[i].category_id));
                html += '<tr class="text-center">';
                html += '<td style="vertical-align:middle;">' + (++count) + '</td>';
                html += '<td style="vertical-align:middle;">' + data[i].title + '</td>';
                html += '<td style="vertical-align:middle;">' + getType(data[i].category_id) + '</td>';
                html += '<td><img width="60px" src="/' + data[i].logo + '" class="img-thumbnail"></td>';
                html += '<td style="vertical-align:middle;">' + data[i].summary.substr(0,20) + '</td>';
                html += '<td style="vertical-align:middle;"><a href="/{{ route("admin::ware.upd") }}?id=' + data[i].id + '">编辑</a> / <a href="javascript:;" onclick="del(' + data[i].id + ',this)">删除</a></td>';
                html += '</tr>';
            }
            //   alert(html);
            console.log(html);
            $("#ware-data").html(html);

        }
        $.get('/config/categorys',function(data){
            categorys = data;
//            console.log(categorys);
            page(1);
        });
        function getType(type){
            return String(categorys[type]);
        }

        function del(id,obj) {

            layer.open({
                'title': '删除分类',
                'content': '你确定要删除这个商品吗?',
                'btn': ['删除', '取消'],
                'yes': function () {
                    $.post('{{ route("admin::ware.del") }}', {'id': id}, function (data) {

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
