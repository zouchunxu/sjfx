<?php
namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Ware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WareController extends Controller
{
    public function anyAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $return = ['error' => 0, 'msg' => '添加商品成功！'];
            if ($request->hasFile('logo')) {
                $name = $request->file('logo')->getClientOriginalName();
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                $fileName = md5(microtime()) . ".{$extension}";
                $dirName = 'upload/' . date('Ymd');
                if (!is_dir($dirName)) {
                    mkdir($dirName);
                    chown($dirName,'www');
                }
                $request->file('logo')->move($dirName, $fileName);
                $imgFile = $dirName . '/' . $fileName;
            } else {
                $imgFile = '';
            }
            $traits = $request->input('trait');
            $data = array_merge($request->except('_token', 'trait'), [
                'logo' => $imgFile,
                'trait' => json_encode($traits)
            ]);
            Ware::create($data);
            if ($imgFile) {
                compressedImage($imgFile,0.6);
            }

            return response()->json($return);
        }

        return view('admin/ware-add', [
            'url' => $request->url(),
            'categorys' => Category::all()
        ]);
    }

    public function anyDel(Request $request)
    {
        $return = ['error' => 0, 'msg' => '删除商品成功!'];
        if (!Ware::where('id', $request->input('id'))->delete()) {
            $return['error'] = 1;
            $return['msg'] = '删除分类失败!';
        }
        return response()->json($return);
    }

    public function anyList(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin/ware-list')->withUrl($request->url());
        } else {
            $data = Ware::query()->paginate(1500);
            return response()->json(['data' => $data->toJson(), 'page' => $data->render()]);
        }
    }

    public function anyUpd(Request $request)
    {
        if ($request->isMethod('post')) {

            if ($request->hasFile('logo')) {
                $name = $request->file('logo')->getClientOriginalName();
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                $fileName = md5(microtime()) . ".{$extension}";
                $dirName = 'upload/' . date('Ymd');
                if (!is_dir($dirName)) {
                    mkdir($dirName);
                    chown($dirName,'www');
                }
                $request->file('logo')->move($dirName, $fileName);
                $imgFile = $dirName . '/' . $fileName;
            } else {
                $imgFile = '';
            }
            $traits = $request->input('trait');
            $data = array_merge($request->except('_token', 'trait','files'), [
                'trait' => json_encode($traits)
            ]);
            if(!empty($imgFile)){
                $data['logo'] = $imgFile;
                compressedImage($imgFile,0.6);
            }


            if (Ware::where('id', $request->id)->update($data)) {
                $msg = '修改商品信息成功！';
            } else {
                $msg = '修改商品信息失败！';
            }
            return showMsg($msg, route('admin::ware.index'));
        }
        return view('admin/ware-add', [
            'url' => $request->url(),
            'categorys' => Category::all(),
            'ware' => Ware::find($request->input('id')),
        ]);
    }


}
