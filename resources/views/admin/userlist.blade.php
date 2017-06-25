@extends('admin/layout')

@section('css')

@endsection


@section('main')
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="well with-header  with-footer">
                <div class="header bg-blue">
                    会员列表
                </div>
                <table class="table table-hover">
                    <thead class="">
                    <tr>

                        <th class="text-center">
                            #
                        </th>
                        <th class="text-center">
                            会员名称
                        </th>
                        <th class="text-center">
                            已充金额
                        </th>
                        <th class="text-center">
                            昵称
                        </th>
                        <th class="text-center">
                            真实姓名
                        </th>
                        <th class="text-center">
                            上级会员
                        </th>
                        <th class="text-center">
                            银行卡号
                        </th>
                        <th class="text-center">
                            手机号码
                        </th>
                        <th class="text-center">
                            金币数量
                        </th>
                        <th class="text-center">
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody id="userdata">

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
        page(1);

        function page(page) {
            $.post('/userlist', {'page': page}, function (data) {

                var count = (page - 1) * 15;

                var userdata = eval('(' + data.data + ')');
                setUserData(userdata.data, count);

                $("#page").html(data.page);
            });
        }

        function setUserData(data, count) {
            var html = '';
            for (var i in data) {
                console.log(data[i]);
                html += '<tr class="text-center">';
                html += '<td>' + (++count) + '</td>';
                html += '<td>' + data[i].name + '</td>';
                html += '<td>' + data[i].pay + '</td>';
                html += '<td>' + data[i].nick_name + '</td>';
                html += '<td>' + data[i].actual_name + '</td>';
                html += '<td>' + (data[i].tall_level_user?data[i].tall_level_user.nick_name:'') + '</td>';
                html += '<td>' + data[i].id_card + '</td>';
                html += '<td>' + data[i].phone + '</td>';
                html += '<td>' + data[i].gold + '</td>';
                html += '<td> <a href="/useredit?id=' + data[i].uid + '">编辑</a> / <a href="javascript:;" onclick="del(' + data[i].uid + ',this)">删除</a></td>';
                html += '</tr>';
            }
            //   alert(html);
            $("#userdata").html(html);

        }

        function del(id,obj) {

            layer.open({
                'title': '删除会员',
                'content': '你确定要删除这个会员吗?',
                'btn': ['删除', '取消'],
                'yes': function () {
                    $.post('/userdel', {'uid': id}, function (data) {

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
