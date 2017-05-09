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
            'lists' => array_merge(
                Ware::getWares(1),
                Ware::getWares(4),
                Ware::getWares(5),
                Ware::getWares(2)
            )
        ]);
    }

}
