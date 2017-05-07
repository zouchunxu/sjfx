<?php
namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\UserWithdraw;
use App\User;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function anyIndex()
    {
        return view('wechat.user', [
            'user' => User::query()->find(session('wechatDb.uid'))
        ]);
    }

    public function anyUpdate(Request $request)
    {
        $data = $request->input();
        User::query()->where(['uid' => session('wechatDb.uid')])->update($data);
        session(['wechatDb' => User::query()->find(session('wechatDb.uid'))]);
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
            session(['wechatDb' => $user->toArray()]);
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
        return view('wechat.cash-list')->with([
            'lists' => UserWithdraw::query()->where([
                'uid' => session('wechatDb.uid')
            ])->get()
        ]);
    }

    public function anyCash(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::find(session('wechatDb.uid'));

            if ($user->real_gold < $request->input('price')) {
                return [
                    'error' => 1,
                    'msg' => '金币余额不足！'
                ];
            }
            if (UserWithdraw::create(array_merge($request->except('_token'),[
                'uid' => session('wechatDb.uid')
            ]))) {
                return [
                    'error' => 0,
                    'msg' => '申请提现成功！'
                ];
            } else {
                return [
                    'error' => 1,
                    'msg' => '申请提现失败！'
                ];
            }

        }

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