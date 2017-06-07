@extends('admin/layout')

@section('css')

@endsection


@section('main')
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="well with-header  with-footer">
                <div class="header bg-blue">
                    提现申请列表
                </div>
                <table class="table table-hover">
                    <thead class="">
                    <tr>

                        <th class="text-center">
                            #
                        </th>
                        <th class="text-center">
                            用户名称
                        </th>
                        <th class="text-center">
                            银行卡号
                        </th>
                        <th class="text-center">
                            提现金额
                        </th>
                        <th class="text-center">
                            状态
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
            $.post('{{ route('admin::withdraw.list') }}', {'page': page}, function (data) {

                var count = (page - 1) * 15;
                var userdata = eval('(' + data.data + ')');
                setUserData(userdata.data, count);

                $("#page").html(data.page);
            });
        }
        page(1);
        function setUserData(data, count) {
            var html = '';
            for (var i in data) {
                html += '<tr class="text-center">';
                html += '<td>' + (++count) + '</td>';
                html += '<td>' + data[i].user.name + '</td>';
                html += '<td>' + data[i].id_card + '</td>';
                html += '<td>' + data[i].price + '</td>';
                html += '<td class="status">' + (data[i].status == 0 ? "等待审核" : "已经审核") + '</td>';
                html += '<td><a href="javascript:;" onclick="apply(' + data[i].id + ',this)">审核</a> / <a href="javascript:;" onclick="del(' + data[i].id + ',this)">删除</a></td>';
                html += '</tr>';
            }
            //   alert(html);
            $("#category-data").html(html);

        }


        function apply(id,obj) {

            layer.open({
                'title': '审核',
                'content': '审核提现申请',
                'btn': ['审核', '取消'],
                'yes': function () {
                    $.post('{{ route("admin::withdraw.apply") }}', {'id': id}, function (data) {

                        if(data.error == 0){
                            $(obj).parents('tr').find('.status').html('已经审核');
                        }

                        layer.msg(data.msg);
                    });
                }
            });
        }
        function del(id,obj) {

            layer.open({
                'title': '删除分类',
                'content': '你确定要删除这条提现审核吗?',
                'btn': ['删除', '取消'],
                'yes': function () {
                    $.post('{{ route("admin::withdraw.del") }}', {'id': id}, function (data) {
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
