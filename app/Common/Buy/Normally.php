<?php
namespace App\Common\Buy;

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
        try {
            DB::beginTransaction();
            MyGood::create([
                'ware_id' => $this->ware->id,
                'uid' => $this->user->uid,
                'status' => 0
            ]);
            $this->user->deductGold($price);
            DB::commit();
        } catch (\Exception $e) {
            throw $e;
        }

    }
}