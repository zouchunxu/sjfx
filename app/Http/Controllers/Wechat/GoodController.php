<?php
namespace App\Http\Controllers\Wechat;


use App\Http\Controllers\Controller;
use App\Models\MyGood;
use App\Models\Ware;
use App\User;
use Illuminate\Http\Request;

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

    public function anyMyGoods(Request $request)
    {
        $status = $request->input('status',0);
        $uid = session('wechatDb.uid');
        return MyGood::query()->with('ware')->where('status',$status)->where('uid',$uid)->get();
    }


    public function anyBuy(Request $request)
    {
        $wareId = $request->input('ware_id');
        $uid = session('wechatDb.uid');
        $ware = Ware::find($wareId);
        $user = User::find($uid);
        $map = config('categorytypes.map');
        $class = array_get($map, $ware->getCatType());
        $buy = new $class($ware, $user);
        $buy->buy();
    }

    private function getWares($type)
    {
        return Ware::getWares($type);
    }

}