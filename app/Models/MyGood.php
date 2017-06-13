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
                $ratio = $ware->trait['income'] * $ware->trait['expired'] * $good->count;
//                $ratio = $rand / 100;
                $gain = $ware->trait['price'] * $ratio;
                $gold = $ware->trait['price'] + $gain * 0.7;
                $integral = $gain * 0.3;
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