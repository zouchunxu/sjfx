<?php

namespace App\Http\Middleware;

use App\Models\UserMapLog;
use App\User;
use Closure;

class WechatMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $wechat = session('wechat.oauth_user');
        if ($wechat) {
            $token = $wechat['token'];
            $user = User::firstOrNew(['open_id' => $token['openid']]);
            $user->name = $wechat['name'];
            $user->email = strval($wechat['email']);
            $user->nick_name = strval($wechat['nickname']);
            $user->head = $wechat['avatar'];
            if (!isset($user->virtual_gold)) {
                $user->virtual_gold = 2;  //新增用户默认增加2个金币
            }
            $user->sex = $wechat['original']['sex'] == 1 ? '男' : '女';
            $user->open_id = $token['openid'];
            $user->access_token = $token['access_token'];
            if (empty($user->super)) {
                $user->super = UserMapLog::getSuperUid($token['openid']);
            }
            $user->save();
            session(['wechatDb' => $user->toArray()]);
            return $next($request);
        }
    }
}
