<?php
namespace App\Http\Controllers\Wechat;


use App\Http\Controllers\Controller;
use App\Models\Category;
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

    public function anyList(Request $request)
    {
        $category = $request->input('cid');
        return view('wechat.list')->with([
            'lists' => Ware::query()->where('category_id',$category)->get()
        ]);
    }


    public function anyMyGoods(Request $request)
    {
        $uid = session('wechatDb.uid');
        $cid = $request->input('cid', 1);
        $model  = MyGood::query()->with('ware')->leftJoin('wares', 'wares.id', '=', 'ware_id')
            ->select("my_goods.*")->orderBy('my_goods.id', 'desc')
            ->where('category_id', $cid)->where('uid', $uid);
        $m = clone $model;
        $goods = $m->where('status', 0)->get();
        $cur = time();
        foreach ($goods as $good) {
            $ware = $good->ware;
            $time = strtotime("{$good->created_at} +{$ware->trait['expired']} day");
//            $time = intval($good->ware->trait['expired'] - ((time() - strtotime($good->created_at)) / 60 / 60));
            if ($time <= $cur) {
                $good->status = 1;
            }
            $good->save();
        }

        return view('wechat.my-good')->with([
            'goods1' => $model->where('status', 0)->get(),
            'goods2' => $model->where('status', 1)->get()
        ]);
    }

    public function anyReward(Request $request)
    {
        try {
            $id = $request->input('id');
            $uid = session('wechatDb.uid');
            MyGood::reward($uid, $id);
        } catch (\Exception $e) {
            return [
                'error' => 1,
                'msg' => $e->getMessage()
            ];
        }
        return [
            'error' => 0,
            'msg' => '收获成功！'
        ];

    }

    public function anyGoodInfo()
    {
        return view('wechat.good-info');
    }

    public function anyBuy(Request $request)
    {
        $wareId = $request->input('ware_id');
        $uid = session('wechatDb.uid');
        try {
            $ware = Ware::find($wareId);
            $user = User::find($uid);
            $map = config('categorytypes.map');
            $class = array_get($map, $ware->getCatType());
            $buy = new $class($ware, $user);
            $buy->buy();
        } catch (\Exception $exception) {
            return [
                'error' => 1,
                'msg' => $exception->getMessage()
            ];
        }
        return [
            'error' => 0,
            'msg' => '购买成功！'
        ];
    }

    private function getWares($type)
    {
        return Ware::getWares($type);
    }

    public function anyDetail(Request $request)
    {
        $id = $request->input('id');
        $good = Ware::query()->find($id);
        $key = Category::query()->lists('type', 'id')->toArray();

        return view('wechat.good-info')->with([
            'good' => $good,
            'types' => config('categorytypes.fields.' . $key[$good['category_id']]),
        ]);
    }


}