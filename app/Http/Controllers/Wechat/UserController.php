<?php
namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\ApplyIntegralShop;
use App\Models\Extend;
use App\Models\Farmer;
use App\Models\MyGood;
use App\Models\UserWithdraw;
use App\User;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function anyIndex()
    {
        $uid = session('wechatDb.uid');
        return view('wechat.user', [
            'user' => User::query()->find($uid),
            'levelName' => User::getLevelName($uid),
            'count' => User::query()->count()
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

    public function anyFriends()
    {
        $uid = session('wechatDb.uid');
        $user = User::query()->with('lowLevelUser.lowLevelUser','superInfo')->find($uid)->toArray();

        foreach ($user['low_level_user'] as $datum) {
            //一级
            $user['one'][] = $datum;
            foreach ($datum['low_level_user'] as $item) {
                //二级
                $user['tow'][] = $item;
            }
        }

        $uids = array_column((array)array_get($user,'two'),'uid');

        $threeUser = (array)User::query()->where('uid','in',$uids)->get()->toArray();
        if($threeUser){
            $user['three'] = $threeUser;
        }


        return view('wechat.friends', compact('user'));
    }


    public function anyUserInfo()
    {
        $uid = session('wechatDb.uid');
        $count = intval(Extend::query()->where(['uid' => $uid])->sum('count'));
        return view('wechat.user-info')->with(['goodCount' => $count + 50]);
    }

    public function anyCashList()
    {
        return view('wechat.cash-list')->with([
            'lists' => UserWithdraw::query()->where( 'uid', session('wechatDb.uid'))->get()
        ]);
    }

    public function anyCash(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::find(session('wechatDb.uid'));
            if ($request->input('price') < 50) {
                return [
                    'error' => 1,
                    'msg' => '提现金额必须大于50！'
                ];
            }
            if ($user->getAllGold() < $request->input('price')) {
                return [
                    'error' => 1,
                    'msg' => '金币余额不足！'
                ];
            }
            $user->deductGold($request->input('price'));
            $user->save();
            if (UserWithdraw::create(array_merge($request->except('_token'), [
                'uid' => session('wechatDb.uid')
            ]))
            ) {
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

    public function anyRecharge(Request $request)
    {
        return view('wechat.recharge')->with([
            'farmer' => Farmer::query()->with('ware')->where(
                'uid', session('wechatDb.uid'))->where('status', 0)->get()
        ]);
    }


    public function anyConvertList()
    {
        return view('wechat.convert-list')->with([
            'lists' => ApplyIntegralShop::query()->with('ware')->where( 'uid', session('wechatDb.uid'))->get()
        ]);
    }

    public function anyScore()
    {
        return view('wechat.score');
    }

    public function anySumCash(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::find(session('wechatDb.uid'));
            if ($request->input('price') < 50) {
                return [
                    'error' => 1,
                    'msg' => '提现金额必须大于50！'
                ];
            }
            if ($user->welfare < $request->input('price')) {
                return [
                    'error' => 1,
                    'msg' => '福利不足！'
                ];
            }
            $user->welfare -= $request->input('price');
            $user->save();
            if (UserWithdraw::create(array_merge($request->except('_token'), [
                'uid' => session('wechatDb.uid')
            ]))
            ) {
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
        return view('wechat.sum-cash');
    }
}