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
            $return = ['error'=>0,'msg'=>'添加会员成功！'];
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
}
