<?php
namespace App\Http\Controllers\Wechat;


use App\Http\Controllers\Controller;

class GoodController extends Controller
{
    public function anyIndex()
    {
        return view('wechat.good');
    }
}