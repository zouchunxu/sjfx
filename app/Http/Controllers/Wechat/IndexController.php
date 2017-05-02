<?php
namespace App\Http\Controllers\Wechat;

use App\Models\Ware;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function getTest()
    {
        dd(session('wechat.oauth_user'));
    }

    public function getIndex()
    {
        return view('wechat.index')->with([
            'lists' => Ware::getWares(1)
        ]);
    }

}
