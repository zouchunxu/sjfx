<?php
namespace App\Common\Buy;

use App\Models\Extend;
use DB;

class MyExtend extends BuyClass
{
    protected function _buy()
    {
        $trait = $this->ware->trait;
        $price = $trait['price'] * $this->count;
        $count = $trait['count'] * $this->count;

        $userPrice = $this->user->getAllGold();
        if ($price > $userPrice) {
            throw new BuyException('金币不足，请先充值！');
        }

        try {
            DB::beginTransaction();
            $extend = Extend::query()->firstOrNew([
                'uid' => $this->user->uid,
                'type' => 0
            ]);
            $extend->count += $count;
            $extend->save();

//            $this->user->incrementIntegral($price);
            $this->user->deductGold($price);
            DB::commit();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
