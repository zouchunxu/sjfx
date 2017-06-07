<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\UserWithdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class WithdrawController extends Controller
{
    public function anyList(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin/withdraw-list')->withUrl($request->url());
        } else {
            $data = UserWithdraw::query()->with('user')->paginate(15);
            return response()->json(['data' => $data->toJson(), 'page' => $data->render()]);
        }
    }

    public function anyApply(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status',1);
        UserWithdraw::query()->where(['id'=>$id])->update([
            'status' => $status
        ]);

        return response()->json([
            'error' => 0,
            'msg' => '审核成功！'
        ]);
    }

    public function anyDel(Request $request)
    {
        $return = ['error' => 0, 'msg' => '删除提现成功!'];
        if (!UserWithdraw::where('id', $request->input('id'))->delete()) {
            $return['error'] = 1;
            $return['msg'] = '删除提现失败!';
        }
        return response()->json($return);
    }


}