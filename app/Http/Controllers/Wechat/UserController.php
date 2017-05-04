<?php
namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\User;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function anyIndex()
    {
        return view('wechat.user',[
            'user' => User::query()->find(session('wechatDb.uid'))
        ]);
    }

    public function anyUpdate(Request $request)
    {
        $data = $request->input();
        User::query()->where(['uid' => session('wechatDb.uid')])->update($data);
        session(['wechatDb'=>User::query()->find(session('wechatDb.uid'))]);
    }

    public function anyMyHome()
    {
        return view('wechat.home');
    }

    public function anyQrcode(Application $wechat)
    {
        $ticket = session('wechatDb.ticket');
        if (empty($ticket)) {
            $qrcode = $wechat->qrcode;
            $result = $qrcode->forever(session('wechatDb.uid'));
            $ticket = $result->ticket;
            $user = User::query()->find(session('wechatDb.uid'));
            $user->ticket = strval($ticket);
            $user->save();
            session(['wechatDb'=>$user->toArray()]);
        }
        return view('wechat.qrcode', [
            'qrcode' => $wechat->qrcode->url($ticket)
        ]);
    }


    public function anyUserInfo()
    {
        return view('wechat.user-info');
    }

    public function anyCashList()
    {
        return view('wechat.cash-list');
    }

    public function anyCash()
    {
        return view('wechat.cash');
    }

    public function anyConvertList()
    {
        return view('wechat.convert-list');
    }

    public function anyScore()
    {
        return view('wechat.score');
    }

    public function anySumCash()
    {
        return view('wechat.sum-cash');
    }
}