<?php
namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommonController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $fileName = md5(microtime()) . ".{$extension}";
            $dirName = 'upload/' . date('Ymd');
            if (!is_dir($dirName)) {
                mkdir($dirName, 777);
            }
            $request->file('logo')->move($dirName, $fileName);
            $imgFile = $dirName.'/'.$fileName;
            return $request->url().'/'.$imgFile;
        }
    }
}