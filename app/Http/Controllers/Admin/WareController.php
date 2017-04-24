<?php
namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WareController extends Controller
{
    public function anyAdd(Request $request)
    {

        if ($request->isMethod('post')) {
            var_dump($request->input('type'));
            die;
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
