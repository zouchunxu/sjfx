<?php
namespace App\Common\Buy;

use App\Models\Farmer as F;
use DB;

class FarmerFood extends BuyClass
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
            $farmer = F::query()->where([
                'uid' => $this->user->uid
            ])->first();
            if ($farmer->status == 1) {
                $farmer->expired = $trait['expired'];
            } else {
                $farmer->expired += $trait['expired'];
            }
            $farmer->status = 0;
            $farmer->save();
            $this->user->deductGold($price);
            DB::commit();
        } catch (\Exception $e) {
            throw $e;
        }

    }
}