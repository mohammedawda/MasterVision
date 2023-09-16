<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * get all category children
     * 
     * @return collection
    */
    public function allCatChildren(Request $request)
    {
        $cat_id  = $request->cat_id ?? null;
        if(empty($cat_id)) {
            return response()->json([
                "status" => false,
                "message" => "missing inputs",
                "code" => 204,
            ], 411);
        }
        $allChildren = loadModule('category')->CatChildren($cat_id);
        return $allChildren;	
    }
}
