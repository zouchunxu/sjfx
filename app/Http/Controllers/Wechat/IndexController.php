<?php
namespace App\Http\Controllers\Wechat;

use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function getTest()
    {
        dd(session('wechat.oauth_user'));
    }

    public function getIndex()
    {
        return view('wechat.index');
    }

}
