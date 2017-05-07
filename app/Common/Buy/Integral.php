<?php
namespace App\Common\Buy;

use App\Models\ApplyIntegralShop;
use DB;

class Integral extends BuyClass
{


    protected function _buy()
    {
        $trait = $this->ware->trait;
        $price = $trait['price'];
        $integral = $trait['integral'];
        $userPrice = $this->user->getAllGold();
        if ($price > $userPrice) {
            throw new BuyException('金币不足，请先充值！');
        }
        if ($integral > $this->user->integral) {
            throw new BuyException('积分不足！');
        }

        $subIntegral = $integral - $price;
        try {
            DB::beginTransaction();
            ApplyIntegralShop::create([
                'uid' => $this->user->uid,
                'ware_id' => $this->ware->id,
                'status' => 0
            ]);
            $this->user->incrementIntegral($subIntegral);
            $this->user->deductGold($price);
            DB::commit();
        } catch (\Exception $e) {
            throw $e;
        }

    }
}