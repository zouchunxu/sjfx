<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class ConfigController extends Controller
{
    public function getCategoryTypes()
    {
        return response()->json(config('categorytypes'));
    }
}