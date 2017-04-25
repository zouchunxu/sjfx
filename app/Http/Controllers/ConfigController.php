<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ConfigController extends Controller
{
    public function getCategoryTypes()
    {
        return response()->json(config('categorytypes.names'));
    }

    public function getCategoryTypesField(Request $request)
    {
        $arr = config('categorytypes.fields');
        return response()->json($arr[$request->input('type')]);
    }

    public function getCategorys()
    {
        return response()->json(Category::lists('name','id'));
    }


}