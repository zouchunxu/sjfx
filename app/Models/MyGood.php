<?php
namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MyGood extends Model
{
    protected $table = 'my_goods';

    protected $guarded = ['id'];


    public function ware()
    {
        return $this->hasOne(Ware::class, 'id', 'ware_id');
    }

    public static function reward($uid, $id)
    {
        $good = MyGood::query()->find($id);
        $ware = $good->ware;
        $time = strtotime("{$good->created_at} +{$ware->trait['expired']} day");
        $cur = time();
        if ($time <= $cur) {
            //增加用户收益
            try {
                $ratio = $ware->trait['income'] * $good->count;
//                $ratio = $rand / 100;
                $gain = $ware->trait['price'] * $ratio;

                $rewardGold =  $gain * 0.7 < 0.01?0.01* $good->count: $gain * 0.7 ;
                $rewardIntegral =  $gain * 0.3 < 0.01?0.01* $good->count: $gain * 0.3 ;
                $gold = $ware->trait['price'] * $good->count +$rewardGold;
                $integral =$rewardIntegral;
                $user = User::query()->find($uid);
                $user->virtual_gold = floatval($user->virtual_gold + $gold);
                $user->integral = floatval($user->integral + $integral);
                $user->save();
                $good->delete();
                session(['wechatDb' => $user->toArray()]);
            } catch (\Exception $exception) {
                throw $exception;
            }
        } else {
            throw new \Exception('还没有成熟！');
        }

    }

}