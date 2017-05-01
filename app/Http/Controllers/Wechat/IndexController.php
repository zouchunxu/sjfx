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
        $wares = Ware::orderBy('id', 'desc')->get();


        return view('wechat.index')->with([
            'lists' => $wares
        ]);
    }

}
