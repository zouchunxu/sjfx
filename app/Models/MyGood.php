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
                $rand = $ware->trait['income'] * $ware->trait['expired'];
                $ratio = $rand / 100;
                $gain = number_format($ware->trait['price'] * $ratio, 2);
                $gold = $gain * 0.7;
                $integral = $gain * 0.3;
                $user = User::query()->find($uid);
                $user->virtual_gold += $gold;
                $user->integral += $integral;
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