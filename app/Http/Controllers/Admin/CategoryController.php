<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function anyList(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin/category-list')->withUrl($request->url());
        } else {
            $data = Category::paginate(15);
            return response()->json(['data' => $data->toJson(), 'page' => $data->render()]);
        }
    }

    public function anyAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $return = ['error' => 0, 'msg' => '添加分类成功！'];
            $this->validate($request, [
                'name' => 'required|unique:categorys|max:32',
                'type' => 'required',
            ]);

            Category::create($request->except('_token'));
            return response()->json($return);
        }
        return view('admin/category-add',[
            'url' => $request->url()
        ]);
    }

    public function anyUpd(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|unique:categorys,name,'.$request->id.',id|max:32',
                'type' => 'required',
            ]);

            if (Category::where('id', $request->id)->update(array_unique($request->except(['id', '_token'])))) {
                $msg = '修改分类信息成功！';
            }else{
                $msg = '修改分类信息失败！';
            }
            return showMsg($msg,route('admin::category.index'));
        } else {
            return view('admin/category-add', ['url' => route('admin::category.index'), 'category' => Category::find($request->input('id'))]);

        }
    }


    public function anyDel(Request $request)
    {
        $return = ['error' => 0, 'msg' => '删除分类成功!'];
        if (!Category::where('id', $request->input('id'))->delete()) {
            $return['error'] = 1;
            $return['msg'] = '删除分类失败!';
        }
        return response()->json($return);
    }

}