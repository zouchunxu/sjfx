<?php
namespace App\Common\Buy;

use App\Models\Farmer as F;
use DB;

class Farmer extends BuyClass
{


    protected function _buy()
    {
        $trait = $this->ware->trait;
        $price = $trait['price'];
        $userPrice = $this->user->getAllGold();
        if ($price > $userPrice) {
            throw new BuyException('金币不足，请先充值！');
        }
        try {
            DB::beginTransaction();
            F::create([
                'ware_id' => $this->ware->id,
                'uid' => $this->user->uid,
                'expired' => 24 * 7,
                'status' => 0
            ]);
            $this->user->incrementIntegral($price);
            $this->user->deductGold($price);
            DB::commit();
        } catch (\Exception $e) {
            throw $e;
        }

    }
}