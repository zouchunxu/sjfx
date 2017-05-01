<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('get')) {

            return view('admin/useradd',['url'=>$request->url()]);
        } else {
            $return = ['error' => 0, 'msg' => '添加会员成功！'];
            $this->validate($request, [
                'name' => 'required|unique:users|max:32',
                'email' => 'unique:users|email',
//                'password' => 'required|confirmed',
                'qq_code' => 'integer',
                'phone' => 'unique:users',
                'integral' => 'integer',
            ]);

            User::create($request->except('password_confirmation'));
            return response()->json($return);
        }
    }

    public function index(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin/userlist')->withUrl($request->url());
        } else {
            $data = User::paginate(15);
            return response()->json(['data' => $data->toJson(), 'page' => $data->render()]);
        }
    }

    public function del(Request $request)
    {

        $return = ['error' => 0, 'msg' => '删除会员成功!'];
        if (!User::where('uid', $request->input('uid'))->delete()) {
            $return['error'] = 1;
            $return['msg'] = '删除会员失败!';
        }
        return response()->json($return);
    }

    public function upd(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|unique:users,name,' . $request->uid . ',uid|max:32',
                'email' => 'unique:users,email,' . $request->uid . ',uid|email',
//                'password' => 'confirmed',
                'qq_code' => 'integer',
                'phone' => 'unique:users,phone,' . $request->uid . ',uid',
                'integral' => 'integer',
            ]);
            if (User::where('uid', $request->uid)->update(array_unique($request->except(['uid', '_token'])))) {
                $msg = '修改会员资料成功！';
            }else{
                $msg = '修改会员资料失败！';
            }
            return showMsg($msg,'/userlist');
        } else {
            return view('admin/useradd', ['url' => '/userlist', 'user' => User::find($request->input('id'))]);

        }

    }


}
