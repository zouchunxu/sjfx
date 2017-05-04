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
        $uid = session('wechatDb.uid');
        $cid = $request->input('cid', 1);
        $good = MyGood::query()->with('ware')->leftJoin('wares', 'wares.id', '=', 'ware_id')
            ->select("my_goods.*")->orderBy('my_goods.id', 'desc')
            ->where('category_id', $cid)->where('uid', $uid);

        $goods =$good->where('status', 0)->get();

        foreach ($goods as $good) {
            $time = intval($good->ware->trait['expired']-((time()-strtotime($good->created_at))/60/60));
            if($time < 0){
                $good->status = 1;
            }
            $good->save();
        }

        return view('wechat.my-good')->with([
            'goods1' => $good->where('status', 0)->get(),
            'goods2' => $good->where('status', 1)->get()
        ]);
    }

    public function anyReward(Request $request)
    {
        $id = $request->input('id');
        $good = MyGood::query()->find($id);

    }

    public function anyGoodInfo()
    {
        return view('wechat.good-info');
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

    public function anyDetail(Request $request)
    {
        $id = $request->input('id');
        return view('wechat.good-info')->with([
            'good' => Ware::query()->find($id)
        ]);
    }


}