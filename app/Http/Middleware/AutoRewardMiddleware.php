<?php

namespace App\Http\Middleware;

use App\Models\Farmer;
use App\Models\MyGood;
use Closure;

class AutoRewardMiddleware
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
        $uid = session('wechatDb.uid');
        $farmer = Farmer::query()->where([
            'uid' => $uid,
            'status' => 0
        ])->first();
        if (is_object($farmer)) {
            $expired = strtotime("{$farmer->created_at} +{$farmer->expired} hour");
            if ($expired < time()) {
                $farmer->status = 1;
                $farmer->save();
            } else {
                $ids = MyGood::query()->lists('id');
                foreach ($ids as $id) {
                    try {

                        MyGood::reward($uid, $id);
                    } catch (\Exception $exception) {

                    }
                }
            }
        }

        return $next($request);
    }
}
