<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class IndexController extends Controller
{
    public function index(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('admin/useradd')->withUrl($request->url());
        } else {
            $return = ['error' => 0, 'msg' => '添加会员成功！'];
            $this->validate($request, [
                'name' => 'required|unique:users|max:32',
                'email' => 'unique:users|email',
                'password' => 'required|confirmed',
                'qq_code' => 'integer',
                'phone' => 'unique:users',
                'integral' => 'integer',
            ]);

            /*      if($request->hasFile('head') && $request->file('head')->isValid()){

                  }*/
            User::create($request->except('password_confirmation'));
            return response()->json($return);
        }
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $username = $request->input('username');
            $password = $request->input('password');
            $users = config('admin');
            $user = $users[$username];
            if ($user && $user['password'] == $password) {
                session(['admin' => $user]);
                return showMsg('登录成功！', '/useradd');
            } else {
                return showMsg('账号或密码错误！', '/admin-login');
            }
        }

        return view('admin/login');
    }


    public function loginOut()
    {
        session(['admin'=>'']);
        return showMsg('退出成功！','/admin-login');
    }
}
