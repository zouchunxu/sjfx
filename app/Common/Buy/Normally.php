<?php
namespace App\Common\Buy;

use App\Models\Extend;
use DB;
use App\Models\MyGood;

class Normally extends BuyClass
{


    protected function _buy()
    {
        $trait = $this->ware->trait;
        $price = $trait['price'];
        $userPrice = $this->user->getAllGold();
        if ($price > $userPrice) {
            throw new BuyException('金币不足，请先充值！');
        }
        $defaultCount = 9;
        $goodCount = MyGood::query()->where(['uid' => $this->user->uid])->count();
        $buyCount = Extend::query()->where(['uid' => $this->user->uid])->first();
        if($buyCount){
            $buyCount = $buyCount->value('count');
        }else{
            $buyCount=0;
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
                'status' => 0
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