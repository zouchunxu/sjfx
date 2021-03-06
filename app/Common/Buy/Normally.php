<?php
namespace App\Common\Buy;

use App\Common\RedisHelp;
use App\Models\Extend;
use DB;
use App\Models\MyGood;

class Normally extends BuyClass
{

    protected function _buy()
    {
        $trait = $this->ware->trait;
        $price = $trait['price'] * $this->count;
        $userPrice = $this->user->getAllGold();
        if ($price > $userPrice) {
            throw new BuyException('金币不足，请先充值！');
        }
        $defaultCount = 50;
        $goodCount = MyGood::query()->where(['uid' => $this->user->uid])->sum('count');
        $buyCount = intval(Extend::query()->where(['uid' => $this->user->uid])->sum('count'));

        $redis = (new RedisHelp())->getRedis();
        $key = "buy:count:{$this->user->uid}:{$this->ware->id}";
        if ($redis->get($key) > 2000) {
            throw new BuyException('招财树限量2000！');
        }

        $key1 = 'pay:'.$this->user->uid;

        if ($redis->get($key1) > 5000) {
            die('每个用户最多消费5000！');
        }
        $redis->incrByFloat($key, floatval($price));

        if ($this->ware->id == 26) {
            $redis->incrBy($key, $this->count);
        }

        $sum = $defaultCount + $buyCount;

        if ($sum <= $goodCount) {
            throw new BuyException('土地不足，请扩充更多的土地');
        }

        try {
            DB::beginTransaction();
            MyGood::create([
                'ware_id' => $this->ware->id,
                'uid' => $this->user->uid,
                'status' => 0,
                'count' => $this->count
            ]);
//            $this->user->incrementIntegral($price);
            $this->user->deductGold($price);
            $this->user->level += 1;
            $this->user->save();
            DB::commit();
        } catch (\Exception $e) {
            throw $e;
        }

    }
}