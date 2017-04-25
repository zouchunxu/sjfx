<?php
namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Ware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WareController extends Controller
{
    public function anyAdd(Request $request)
    {

        if ($request->isMethod('post')) {
            if ($request->hasFile('logo')) {
                $return = ['error' => 0, 'msg' => '添加分类成功！'];
                $name = $request->file('logo')->getClientOriginalName();
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                $fileName = md5(microtime()) . ".{$extension}";
                $dirName = './upload/' . date('Ymd');
                if (!is_dir($dirName)) {
                    mkdir($dirName, 777);
                }
                $request->file('logo')->move($dirName, $fileName);
                $imgFile = $dirName . '/' . $fileName;
            } else {
                $imgFile = '';
            }

            var_dump($request->input());
            die;

            $data = array_merge($request->except('_token'), [
                'logo' => $imgFile
            ]);
            Ware::create($data);
//            compressedImage($imgFile,0.6);
            return response()->json($return);
        }

        return view('admin/ware-add', [
            'url' => $request->url(),
            'categorys' => Category::all()
        ]);
    }

    public function anyDel()
    {

    }

    public function anyList()
    {

    }

    public function anyUpd()
    {

    }


}
