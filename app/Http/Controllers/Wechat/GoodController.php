<?php
namespace App\Http\Controllers\Wechat;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Ware;

class GoodController extends Controller
{
    public function anyIndex()
    {
        return view('wechat.good')->with([
            'normallyShop' => $this->getWares(0),
            'integralShop' => $this->getWares(1),
            'otherShop' => $this->getWares(3)
        ]);
    }

    private function getWares($type)
    {
        static $_cache;
        if (empty($_cache)) {
            $types = Category::lists('type','id');

            $wares = Ware::orderBy('id', 'desc')->get();
            foreach ($wares as $ware) {
                $type = $types[$ware->category_id];
                $_cache[$type][] = $ware;
            }
        }
        return array_get($_cache,$type);


    }

}